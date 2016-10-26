<?php
namespace Ink\Tokens
{
    class LinkEndToken implements TokenInterface
    {
        public function __toString(): string
        {
            return ']]';
        }
    }
}
