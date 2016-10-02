<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Blocks\UnorderedList;
    use Ink\Lines\LineInterface;
    use Ink\Lines\UnorderedListLine;
    use Ink\TokenParsers\LineParser\State;

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