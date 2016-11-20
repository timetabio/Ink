<?php
namespace Ink\Generators\Dom
{
    use Ink\Generators\Dom\BlockRenderers\BlockRendererInterface;

    class Generator implements \Ink\Generators\Generator
    {
        /**
         * @var BlockRendererInterface[]
         */
        private $renderers;

        public function registerRenderer(BlockRendererInterface $renderer)
        {
            $this->renderers[$renderer->getType()] = $renderer;
        }

        public function generate(array $blocks): \Ink\Generators\GeneratorResult
        {
            $document = new \DOMDocument;
            $root = $document->createDocumentFragment();

            foreach ($blocks as $block) {
                $type = get_class($block);

                if (!isset($this->renderers[$type])) {
                    throw new \Exception('No renderer found for block type ' . $type);
                }

                $renderer = $this->renderers[$type];

                $root->appendChild($renderer->render($document, $block));
            }

            if ($root->childNodes->length > 0) {
                $document->appendChild($root);
            }

            return new GeneratorResult($document);
        }
    }
}
