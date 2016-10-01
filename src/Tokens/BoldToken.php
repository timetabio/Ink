<?php
namespace Ink\Tokens
{
    class BoldToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '**';
        }
    }
}