<?php
namespace Ink\TextStyles
{
    class Bold implements TextStyleInterface
    {
        public function __toString(): string
        {
            return 'bold';
        }
    }
}