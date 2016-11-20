<?php
namespace Ink\Lines
{
    class EmptyLine implements LineInterface
    {
        public function __toString(): string
        {
            return '';
        }
    }
}
