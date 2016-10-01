<?php
namespace Ink\Blocks
{
    abstract class AbstractTextBlock implements BlockInterface
    {
        /**
         * @var array
         */
        private $content = [];

        public function addContent(string $content)
        {
            $this->content[] = $content;
        }

        public function getContent(): array
        {
            return $this->content;
        }
    }
}