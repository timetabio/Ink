<?php
namespace Ink\Parsers
{
    use Ink\Tokenizers\LineTokenizer;
    use Ink\TokenParsers\LineParser\Parser;

    class BlockParser
    {
        /**
         * @var LineTokenizer
         */
        private $lineTokenizer;

        /**
         * @var Parser
         */
        private $lineParser;

        public function __construct(LineTokenizer $lineTokenizer, Parser $lineParser)
        {
            $this->lineTokenizer = $lineTokenizer;
            $this->lineParser = $lineParser;
        }

        public function parse(string $input): array
        {
            $lines = $this->lineTokenizer->tokenize($input);
            $blocks = $this->lineParser->parse($lines);

            return $blocks;
        }
    }
}