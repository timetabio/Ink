<?php
namespace Ink\Tokens
{
    interface TokenInterface
    {
        public function __toString(): string;
    }
}