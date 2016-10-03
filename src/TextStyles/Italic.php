<?php
namespace Ink\TextStyles
{
    class Italic implements TextStyleInterface
    {
        public function __toString(): string
        {
            return 'italic';
        }
    }
}