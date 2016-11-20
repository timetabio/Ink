<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Lines\EmptyLine;
    use Ink\Lines\LineInterface;
    use Ink\TokenParsers\LineParser\State;

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
