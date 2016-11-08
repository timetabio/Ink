<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Generators\Dom\TextRenderer;

    class ParagraphRenderer implements BlockRendererInterface
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

            $paragraph = $document->createElement('p');
            $text = $block->getText();

            if (empty($text)) {
                return $paragraph;
            }

            $content = $this->textRenderer->render($document, $text);
            $paragraph->appendChild($content);

            return $paragraph;
        }

        public function getType(): string
        {
            return \Ink\Blocks\Paragraph::class;
        }
    }
}
