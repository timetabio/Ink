<?php
namespace Ink\Generators\Dom\TextRenderers
{
    use Ink\Texts\TextInterface;

    class PlainTextRenderer implements TextRendererInterface
    {
        public function render(\DOMDocument $document, TextInterface $text): \DOMNode
        {
            /** @var \Ink\Texts\PlainText $text */

            return $document->createTextNode($text->getText());
        }

        public function getType(): string
        {
            return \Ink\Texts\PlainText::class;
        }
    }
}
