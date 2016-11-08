<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    class BlockquoteRenderer extends AbstractTextBlockRenderer
    {
        public function getType(): string
        {
            return \Ink\Blocks\Quote::class;
        }

        protected function getTagName(): string
        {
            return 'blockquote';
        }
    }
}
