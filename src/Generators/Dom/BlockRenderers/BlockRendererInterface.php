<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;

    interface BlockRendererInterface
    {
        public function render(\DOMDocument $document, BlockInterface $block): \DOMElement;

        public function getType(): string;
    }
}
