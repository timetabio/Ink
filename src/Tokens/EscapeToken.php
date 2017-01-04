<?php
namespace Ink\Tokens
{
    class EscapeToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '\\';
        }
    }
}
