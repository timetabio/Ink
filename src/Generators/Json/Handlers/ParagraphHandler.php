<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\Paragraph;

    class ParagraphHandler extends AbstractHandler
    {
        public function handle(BlockInterface $block): array
        {
            if (!($block instanceof Paragraph)) {
                throw new \RuntimeException('cannot handle block type');
            }

            return [
                'type' => 'paragraph',
                'content' => $this->getTextHandler()->handle($block->getText())
            ];
        }

        public function getType(): string
        {
            return \Ink\Blocks\Paragraph::class;
        }
    }
}