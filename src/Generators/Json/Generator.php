<?php
namespace Ink\Generators\Json
{
    use Ink\Blocks\BlockInterface;
    use Ink\Generators\Json\Handlers\HandlerInterface;

    class Generator implements \Ink\Generators\Generator
    {
        /**
         * @var HandlerInterface[]
         */
        private $handlers;

        public function registerHandler(HandlerInterface $handler)
        {
            $this->handlers[$handler->getType()] = $handler;
        }

        public function generate(array $blocks): \Ink\Generators\GeneratorResult
        {
            return new GeneratorResult(array_map([$this, 'handleBlock'], $blocks));
        }

        protected function handleBlock(BlockInterface $block)
        {
            $class = get_class($block);

            if (!isset($this->handlers[$class])) {
                throw new \RuntimeException('no handler found for block type ' . $class);
            }

            return $this->handlers[$class]->handle($block);
        }
    }
}
