<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Lines\LineInterface;
    use Ink\TokenParsers\LineParser\State;

    interface LineParserInterface
    {
        public function parse(LineInterface $line, State $state);
    }
}