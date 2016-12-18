<?php
namespace Ink\Generators\Dom\TextRenderers
{
    use Ink\Generators\Dom\GeneratorOptions;
    use Ink\Texts\TextInterface;

    class LinkTextRenderer implements TextRendererInterface
    {
        /**
         * @var GeneratorOptions
         */
        private $options;

        public function __construct(GeneratorOptions $options)
        {
            $this->options = $options;
        }

        public function render(\DOMDocument $document, TextInterface $text): \DOMNode
        {
            /** @var \Ink\Texts\LinkText $text */

            $linkElement = $document->createElement('a');
            $linkElement->setAttribute('href', $text->getUrl());

            if ($this->options->isNoFollow()) {
                $linkElement->setAttribute('rel', 'nofollow');
            }

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
