<?php
namespace Ink\Parsers\LineParsers
{
    use Ink\Blocks\Quote;
    use Ink\Lines\LineInterface;
    use Ink\Lines\QuoteLine;
    use Ink\Parsers\LineParser\State;

    class QuoteLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof QuoteLine)) {
                return;
            }

            $current = $this->getCurrent($state);

            $current->addContent($line->getContent());

            $state->setCurrent($current);
        }

        private function getCurrent(State $state): Quote
        {
            $current = $state->getCurrent();

            if ($current instanceof Quote) {
                return $current;
            }

            $state->commit();

            return new Quote;
        }
    }
}