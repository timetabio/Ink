<?php
namespace Ink\Tokens
{
    class ClosingBracketToken implements TokenInterface
    {
        public function __toString(): string
        {
            return ']';
        }
    }
}