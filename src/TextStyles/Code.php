<?php
namespace Ink\TextStyles
{
    class Code implements TextStyleInterface
    {
        public function __toString(): string
        {
            return 'code';
        }
    }
}