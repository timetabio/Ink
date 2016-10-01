<?php
namespace Ink\Parsers\LineParsers
{
    use Ink\Blocks\UnorderedList;
    use Ink\Lines\LineInterface;
    use Ink\Lines\UnorderedListLine;
    use Ink\Parsers\LineParser\State;

    class UnorderedListLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof UnorderedListLine)) {
                return;
            }

            $current = $this->getCurrent($state);

            $current->addItem($line->getContent());

            $state->setCurrent($current);
        }

        private function getCurrent(State $state): UnorderedList
        {
            $current = $state->getCurrent();

            if ($current instanceof UnorderedList) {
                return $current;
            }

            $state->commit();

            return new UnorderedList;
        }
    }
}