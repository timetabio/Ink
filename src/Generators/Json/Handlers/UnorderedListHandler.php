<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Blocks\BlockInterface;
    use Ink\Blocks\UnorderedList;

    class UnorderedListHandler extends AbstractHandler
    {
        public function handle(BlockInterface $block): array
        {
            if (!($block instanceof UnorderedList)) {
                throw new \RuntimeException('cannot handle block type');
            }

            return [
                'type' => 'list',
                'list_type' => 'unordered',
                'list_items' => array_map([$this->getTextHandler(), 'handle'], $block->getItems())
            ];
        }

        public function getType(): string
        {
            return \Ink\Blocks\UnorderedList::class;
        }
    }
}