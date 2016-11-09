<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;

    class HeadingRenderer implements BlockRendererInterface
    {
        public function render(\DOMDocument $document, BlockInterface $block): \DOMElement
        {
            /** @var \Ink\Blocks\Heading $block */

            $tag = 'h' . $block->getLevel();

            $heading = $document->createElement($tag);
            $heading->appendChild($document->createTextNode($block->getContent()));

            return $heading;
        }

        public function getType(): string
        {
            return \Ink\Blocks\Heading::class;
        }
    }
}
