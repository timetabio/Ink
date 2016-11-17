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

        /**
         * @var \DOMDocument
         */
        private $document;

        public function __construct(\DOMDocument $document)
        {
            $this->document = $document;
        }

        public function registerRenderer(BlockRendererInterface $renderer)
        {
            $this->renderers[$renderer->getType()] = $renderer;
        }

        public function generate(array $blocks): \Ink\Generators\GeneratorResult
        {
            $root = $this->document->createDocumentFragment();

            foreach ($blocks as $block) {
                $type = get_class($block);

                if (!isset($this->renderers[$type])) {
                    throw new \Exception('No renderer found for block type ' . $type);
                }

                $renderer = $this->renderers[$type];

                $root->appendChild($renderer->render($this->document, $block));
            }

            $this->document->appendChild($root);

            return new GeneratorResult($this->document);
        }
    }
}
