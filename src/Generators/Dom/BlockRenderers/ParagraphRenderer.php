<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    class ParagraphRenderer extends AbstractTextBlockRenderer
    {
        public function getType(): string
        {
            return \Ink\Blocks\Paragraph::class;
        }

        protected function getTagName(): string
        {
            return 'p';
        }
    }
}
