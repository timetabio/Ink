<?php
namespace Ink\Tokens
{
    class BacktickToken implements TokenInterface
    {
        public function __toString(): string
        {
            return '`';
        }
    }
}