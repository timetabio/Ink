<?php
namespace Ink\Tokens
{
    class TextToken implements TokenInterface
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
            return $this->content;
        }
    }
}