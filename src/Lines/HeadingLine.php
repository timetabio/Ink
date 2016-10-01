<?php
namespace Ink\Lines
{
    class HeadingLine implements LineInterface
    {
        /**
         * @var int
         */
        private $level;

        /**
         * @var string
         */
        private $content;

        public function __construct(int $level, string $content)
        {
            $this->level = $level;
            $this->content = $content;
        }

        public function getLevel(): int
        {
            return $this->level;
        }

        public function getContent(): string
        {
            return $this->content;
        }
    }
}