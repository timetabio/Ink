<?php
namespace Ink\Generators
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\CodeBlock;
    use Ink\Blocks\Heading;
    use Ink\Blocks\Paragraph;
    use Ink\Blocks\Quote;
    use Ink\Blocks\UnorderedList;
    use Ink\Texts\PlainText;
    use Ink\Texts\TextInterface;
    use Ink\TextStyles\TextStyleInterface;

    class DomGenerator
    {
        /**
         * @var \DOMDocument
         */
        private $dom;

        public function __construct(\DOMDocument $dom)
        {
            $this->dom = $dom;
        }

        public function generate(array $blocks): \DOMDocument
        {
            /** @var BlockInterface $block */
            foreach ($blocks as $block) {
                $this->dom->documentElement->appendChild(
                    $this->processBlock($block)
                );
            }

            return $this->dom;
        }

        private function processBlock(BlockInterface $block)
        {
            switch (get_class($block)) {
                case Heading::class:
                    return $this->processHeading($block);
                case Paragraph::class:
                    return $this->processParagraph($block);
                case Quote::class:
                    return $this->processQuote($block);
                case UnorderedList::class:
                    return $this->processUnorderedList($block);
                case CodeBlock::class:
                    return $this->processCodeBlock($block);
            }
        }

        private function processParagraph(Paragraph $paragraph): \DOMElement
        {
            $element = $this->dom->createElement('p');

            $element->appendChild($this->processTexts($paragraph->getText()));

            return $element;
        }

        private function processTexts(array $texts): \DOMDocumentFragment
        {
            $fragment = $this->dom->createDocumentFragment();

            foreach ($texts as $text) {
                $fragment->appendChild($this->processText($text));
            }

            return $fragment;
        }

        private function processText(TextInterface $text)
        {
            if ($text instanceof PlainText) {
                return $this->dom->createTextNode($text->getText());
            }

            $tag = $this->getTagForStyle($text->getStyle());

            $element = $this->dom->createElement($tag);

            $element->appendChild($this->processTexts($text->getContent()));

            return $element;
        }

        private function getTagForStyle(TextStyleInterface $textStyle)
        {
            switch (get_class($textStyle)) {
                case \Ink\TextStyles\Bold::class:
                    return 'b';
                case \Ink\TextStyles\Italic::class:
                    return 'i';
                case \Ink\TextStyles\Code::class:
                    return 'code';
            }

            return 'span';
        }

        private function processQuote(Quote $quote): \DOMElement
        {
            $element = $this->dom->createElement('blockquote');

            $element->appendChild($this->processTexts($quote->getText()));

            return $element;
        }

        private function processUnorderedList(UnorderedList $list): \DOMElement
        {
            $element = $this->dom->createElement('ul');

            foreach ($list->getItems() as $item) {
                $itemElement = $this->dom->createElement('li');

                $itemElement->appendChild($this->processTexts($item));

                $element->appendChild($itemElement);
            }

            return $element;
        }

        private function processHeading(Heading $heading): \DOMElement
        {
            $element = $this->dom->createElement('h' . $heading->getLevel());
            $element->appendChild($this->dom->createTextNode($heading->getContent()));

            return $element;
        }

        private function processCodeBlock(CodeBlock $block)
        {
            $pre = $this->dom->createElement('pre');

            $code = $this->dom->createElement('code');
            $pre->appendChild($code);

            $code->appendChild($this->dom->createTextNode(implode(PHP_EOL, $block->getLines())));

            return $pre;
        }
    }
}
