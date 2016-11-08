<?php
namespace Ink\Generators\Dom
{
    use Ink\Generators\Dom\TextRenderers\TextRendererInterface;

    class TextRenderer
    {
        /**
         * @var TextRendererInterface[]
         */
        private $renderers;

        public function registerRenderer(TextRendererInterface $renderer)
        {
            $this->renderers[$renderer->getType()] = $renderer;
        }

        public function render(\DOMDocument $document, array $texts): \DOMDocumentFragment
        {
            $fragment = $document->createDocumentFragment();

            foreach ($texts as $text) {
                $type = get_class($text);

                // TODO: catch non-existing renderer
                if (!isset($this->renderers[$type])) {
                    continue;
                }

                $renderer = $this->renderers[$type];

                $fragment->appendChild($renderer->render($document, $text));
            }

            return $fragment;
        }
    }
}
