<?php
namespace Ink\Lines
{
    class UnorderedListLine extends TextLine
    {
        public function __toString(): string
        {
            return '-' . $this->getContent();
        }
    }
}
