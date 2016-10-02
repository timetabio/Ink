<?php
namespace Ink\Tokens
{
    use Ink\TextStyles\TextStyleInterface;

    class BoldToken implements FormatTokenInterface
    {
        public function __toString(): string
        {
            return '**';
        }

        public function getTextStyle(): TextStyleInterface
        {
            return new \Ink\TextStyles\Bold;
        }
    }
}