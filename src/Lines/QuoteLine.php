<?php
namespace Ink\Lines
{
    class QuoteLine extends TextLine
    {
        public function __toString(): string
        {
            return '>' . $this->getContent();
        }
    }
}
