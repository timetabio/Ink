<?php
namespace Ink\Generators\Dom\TextRenderers
{
    use Ink\Generators\Dom\TextRenderer;
    use Ink\Texts\TextInterface;
    use Ink\TextStyles\TextStyleInterface;

    class StyledTextRenderer implements TextRendererInterface
    {
        /**
         * @var TextRenderer
         */
        private $textRenderer;

        public function __construct(TextRenderer $textRenderer)
        {
            $this->textRenderer = $textRenderer;
        }

        public function render(\DOMDocument $document, TextInterface $text): \DOMNode
        {
            /** @var \Ink\Texts\StyledText $text */

            $tagName = $this->getTagName($text->getStyle());
            $element = $document->createElement($tagName);

            $element->appendChild($this->textRenderer->render($document, $text->getContent()));

            return $element;
        }

        private function getTagName(TextStyleInterface $styledText): string
        {
            $type = get_class($styledText);

            switch ($type) {
                case \Ink\TextStyles\Bold::class:
                    return 'b';
                case \Ink\TextStyles\Code::class;
                    return 'code';
                case \Ink\TextStyles\Italic::class:
                    return 'i';
            }

            throw new \Exception('unknown text style ' . $type);
        }

        public function getType(): string
        {
            return \Ink\Texts\StyledText::class;
        }
    }
}
