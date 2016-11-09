<?php
namespace Ink\Generators\Dom\TextRenderers
{
    use Ink\Texts\TextInterface;

    interface TextRendererInterface
    {
        public function render(\DOMDocument $document, TextInterface $text): \DOMNode;

        public function getType(): string;
    }
}
