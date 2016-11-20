<?php
namespace Ink\Lines
{
    class CodeBlockLine implements LineInterface
    {
        public function __toString(): string
        {
            return '```';
        }
    }
}
