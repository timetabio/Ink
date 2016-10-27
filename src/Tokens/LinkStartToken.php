<?php
namespace Ink\Tokens
{
    class LinkStartToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '[[';
        }
    }
}
