<?php
namespace Ink\Tokens
{
    class ItalicToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '//';
        }
    }
}