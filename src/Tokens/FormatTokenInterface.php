<?php
namespace Ink\Tokens
{
    use Ink\TextStyles\TextStyleInterface;

    interface FormatTokenInterface extends TokenInterface
    {
        public function getTextStyle(): TextStyleInterface;
    }
}