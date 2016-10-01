<?php
namespace Ink\Parsers\LineParser\Parsers
{
    use Ink\Lines\EmptyLine;
    use Ink\Lines\LineInterface;
    use Ink\Parsers\LineParser\State;

    class EmptyLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof EmptyLine)) {
                return;
            }

            $state->commit();
        }
    }
}