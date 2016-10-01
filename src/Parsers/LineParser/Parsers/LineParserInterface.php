<?php
namespace Ink\Parsers\LineParser\Parsers
{
    use Ink\Lines\LineInterface;
    use Ink\Parsers\LineParser\State;

    interface LineParserInterface
    {
        public function parse(LineInterface $line, State $state);
    }
}