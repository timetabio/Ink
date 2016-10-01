<?php
namespace Ink\Parsers\LineParser\Parsers
{
    use Ink\Blocks\Heading;
    use Ink\Lines\HeadingLine;
    use Ink\Lines\LineInterface;
    use Ink\Parsers\LineParser\State;

    class HeadingLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof HeadingLine)) {
                return;
            }

            $state->push(new Heading($line->getLevel(), trim($line->getContent())));
        }
    }
}