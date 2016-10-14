<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\Heading;

    class HeadingHandler implements HandlerInterface
    {
        public function handle(BlockInterface $block): array
        {
            if (!($block instanceof Heading)) {
                throw new \RuntimeException('cannot handle block type');
            }

            return [
                'type' => 'heading',
                'level' => $block->getLevel(),
                'content' => $block->getContent()
            ];
        }

        public function getType(): string
        {
            return \Ink\Blocks\Heading::class;
        }
    }
}
