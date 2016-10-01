<?php
namespace Ink\Tokens
{
    class OpeningBracketToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '[';
        }
    }
}