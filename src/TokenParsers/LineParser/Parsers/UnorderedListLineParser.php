<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Blocks\UnorderedList;
    use Ink\Lines\LineInterface;
    use Ink\Lines\UnorderedListLine;
    use Ink\Parsers\TextParser;
    use Ink\TokenParsers\LineParser\State;

    class UnorderedListLineParser implements LineParserInterface
    {
        /**
         * @var TextParser
         */
        private $textParser;

        public function __construct(TextParser $textParser)
        {
            $this->textParser = $textParser;
        }

        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof UnorderedListLine)) {
                return;
            }

            $current = $this->getCurrent($state);
            $texts = $this->textParser->parse(trim($line->getContent()));

            $current->addItem($texts);

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