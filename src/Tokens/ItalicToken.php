<?php
namespace Ink\Tokens
{
    use Ink\TextStyles\TextStyleInterface;

    class ItalicToken implements FormatTokenInterface
    {
        public function __toString(): string
        {
            return '//';
        }

        public function getTextStyle(): TextStyleInterface
        {
            return new \Ink\TextStyles\Italic;
        }
    }
}