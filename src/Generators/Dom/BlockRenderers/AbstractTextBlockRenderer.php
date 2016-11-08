<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Generators\Dom\TextRenderer;

    abstract class AbstractTextBlockRenderer implements BlockRendererInterface
    {
        /**
         * @var TextRenderer
         */
        private $textRenderer;

        public function __construct(TextRenderer $textRenderer)
        {
            $this->textRenderer = $textRenderer;
        }

        public function render(\DOMDocument $document, BlockInterface $block): \DOMElement
        {
            /** @var \Ink\Blocks\Paragraph $block */

            $paragraph = $document->createElement($this->getTagName());
            $text = $block->getText();

            if (empty($text)) {
                return $paragraph;
            }

            $content = $this->textRenderer->render($document, $text);
            $paragraph->appendChild($content);

            return $paragraph;
        }

        abstract protected function getTagName(): string;
    }
}
