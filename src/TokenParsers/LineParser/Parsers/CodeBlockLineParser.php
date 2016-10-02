<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Blocks\CodeBlock;
    use Ink\Lines\CodeBlockLine;
    use Ink\Lines\LineInterface;
    use Ink\TokenParsers\LineParser\State;

    class CodeBlockLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof CodeBlockLine)) {
                return;
            }

            if ($state->getCurrent() instanceof CodeBlock) {
                $state->commit();
                return;
            }

            $state->setCurrent(new CodeBlock);
        }
    }
}