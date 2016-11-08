<?php
namespace Ink\Generators\Dom
{
    use \Ink\Generators\Dom\BlockRenderers\BlockRendererInterface;

    class Generator
    {
        /**
         * @var BlockRendererInterface[]
         */
        private $renderers;

        public function registerRenderer(BlockRendererInterface $renderer)
        {
            $this->renderers[$renderer->getType()] = $renderer;
        }

        public function generate(array $blocks): \DOMDocumentFragment
        {
            $document = new \DOMDocument;
            $root = $document->createDocumentFragment();

            foreach($blocks as $block) {
                $type = get_class($block);

                // TODO: catch non-existing renderer
                if (!isset($this->renderers[$type])) {
                    continue;
                }

                $renderer = $this->renderers[$type];

                $root->appendChild($renderer->render($document, $block));
            }

            return $root;
        }
    }
}
