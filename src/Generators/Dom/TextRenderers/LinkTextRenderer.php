<?php
namespace Ink\Generators\Dom\TextRenderers
{
    use Ink\Texts\TextInterface;

    class LinkTextRenderer implements TextRendererInterface
    {
        public function render(\DOMDocument $document, TextInterface $text): \DOMNode
        {
            /** @var \Ink\Texts\LinkText $text */

            $linkElement = $document->createElement('a');
            $linkElement->setAttribute('href', $text->getUrl());

            $linkText = $document->createTextNode((string) $text);
            $linkElement->appendChild($linkText);

            return $linkElement;
        }

        public function getType(): string
        {
            return \Ink\Texts\LinkText::class;
        }
    }
}
