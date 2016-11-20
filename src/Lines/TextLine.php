<?php
namespace Ink\Lines
{
    class TextLine implements LineInterface
    {
        /**
         * @var string
         */
        private $content;

        public function __construct(string $content)
        {
            $this->content = $content;
        }

        public function getContent(): string
        {
            return $this->content;
        }

        public function __toString(): string
        {
            return $this->getContent();
        }
    }
}
