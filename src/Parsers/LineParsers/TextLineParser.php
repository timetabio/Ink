<?php
namespace Ink\Parsers\LineParsers
{
    use Ink\Blocks\Paragraph;
    use Ink\Lines\LineInterface;
    use Ink\Lines\TextLine;
    use Ink\Parsers\LineParser\State;

    class TextLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof TextLine)) {
                return;
            }

            $current = $this->getCurrent($state);

            $current->addContent($line->getContent());

            $state->setCurrent($current);
        }

        private function getCurrent(State $state): Paragraph
        {
            $current = $state->getCurrent();

            if ($current instanceof Paragraph) {
                return $current;
            }

            $state->commit();

            return new Paragraph;
        }
    }
}