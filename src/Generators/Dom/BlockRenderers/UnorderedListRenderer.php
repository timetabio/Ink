<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Generators\Dom\TextRenderer;

    class UnorderedListRenderer implements BlockRendererInterface
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
            /** @var \Ink\Blocks\UnorderedList $block */

            $list = $document->createElement('ul');

            foreach($block->getItems() as $item) {
                $listItem = $document->createElement('li');
                $listItem->appendChild($this->textRenderer->render($document, $item));

                $list->appendChild($listItem);
            }

            return $list;
        }

        public function getType(): string
        {
            return \Ink\Blocks\UnorderedList::class;
        }
    }
}
