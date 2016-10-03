<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\Quote;

    class QuoteHandler extends AbstractHandler
    {
        public function handle(BlockInterface $block): array
        {
            if (!($block instanceof Quote)) {
                throw new \RuntimeException('cannot handle block type');
            }

            return [
                'type' => 'quote',
                'content' => $this->getTextHandler()->handle($block->getText())
            ];
        }

        public function getType(): string
        {
            return \Ink\Blocks\Quote::class;
        }
    }
}