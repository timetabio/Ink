<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\CodeBlock;

    class CodeBlockHandler implements HandlerInterface
    {
        public function handle(BlockInterface $block): array
        {
            if (!($block instanceof CodeBlock)) {
                throw new \RuntimeException('cannot handle block type');
            }

            return [
                'type' => 'code_block',
                'content' => $block->getLines()
            ];
        }

        public function getType(): string
        {
            return \Ink\Blocks\CodeBlock::class;
        }
    }
}