<?php
namespace Ink\TokenParsers\LineParser
{
    use Ink\Lines\LineInterface;
    use Ink\TokenParsers\LineParser\Parsers\LineParserInterface;

    class Parser
    {
        /**
         * @var State
         */
        private $state;

        /**
         * @var LineParserInterface[]
         */
        private $parsers = [];

        public function __construct()
        {
            $this->state = new State;
        }

        public function registerParser(string $type, LineParserInterface $lineParser)
        {
            $this->parsers[$type] = $lineParser;
        }

        public function parse(array $lines)
        {
            /** @var LineInterface $line */
            foreach ($lines as $line) {
                $this->parseLine($line);
            }

            $this->state->commit();

            return $this->state->getResult();
        }

        private function parseLine(LineInterface $line)
        {
            $type = get_class($line);

            if (!isset($this->parsers[$type])) {
                throw new \RuntimeException('no parser found for line type ' . $type);
            }

            $this->parsers[$type]->parse($line, $this->state);
        }
    }
}