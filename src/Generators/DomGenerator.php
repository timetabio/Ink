<?php
namespace Ink\Generators
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\CodeBlock;
    use Ink\Blocks\Heading;
    use Ink\Blocks\Paragraph;
    use Ink\Blocks\Quote;
    use Ink\Blocks\UnorderedList;

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

            $element->appendChild($this->dom->createTextNode(implode(' ', $paragraph->getContent())));

            return $element;
        }

        private function processQuote(Quote $quote): \DOMElement
        {
            $element = $this->dom->createElement('blockquote');

            $element->appendChild($this->dom->createTextNode(implode(' ', $quote->getContent())));

            return $element;
        }

        private function processUnorderedList(UnorderedList $list): \DOMElement
        {
            $element = $this->dom->createElement('ul');

            foreach($list->getItems() as $item) {
                $itemElement = $this->dom->createElement('li');
                $itemElement->appendChild($this->dom->createTextNode($item));

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

            $code->appendChild($this->dom->createTextNode(implode(PHP_EOL, $block->getContent())));

            return $pre;
        }
    }
}