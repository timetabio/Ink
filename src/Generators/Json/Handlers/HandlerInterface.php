<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;

    interface HandlerInterface
    {
        public function handle(BlockInterface $block): array;

        public function getType(): string;
    }
}