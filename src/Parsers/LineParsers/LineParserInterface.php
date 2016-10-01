<?php
namespace Ink\Parsers\LineParsers
{
    use Ink\Lines\LineInterface;
    use Ink\Parsers\LineParser\State;

    interface LineParserInterface
    {
        public function parse(LineInterface $line, State $state);
    }
}