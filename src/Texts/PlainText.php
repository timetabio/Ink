<?php
namespace Ink\Texts
{
    class PlainText implements TextInterface
    {
        /**
         * @var string
         */
        private $text;

        public function __construct(string $text)
        {
            $this->text = $text;
        }

        public function addText(string $text)
        {
            $this->text .= $text;
        }

        public function getText(): string
        {
            return $this->text;
        }

        public function __toString(): string
        {
            return $this->text;
        }
    }
}
