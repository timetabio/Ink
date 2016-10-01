<?php
namespace Ink
{
    use Ink\Tokenizers\LineTokenizer;

    class Parser
    {
        /**
         * @var LineTokenizer
         */
        private $lineTokenizer;

        /**
         * @var \Ink\Parsers\LineParser\Parser
         */
        private $lineParser;

        public function __construct(LineTokenizer $lineTokenizer, \Ink\Parsers\LineParser\Parser $lineParser)
        {
            $this->lineTokenizer = $lineTokenizer;
            $this->lineParser = $lineParser;
        }

        public function parse(string $input)
        {
            $lines = $this->lineTokenizer->tokenize($input);
            $processed = $this->lineParser->parse($lines);

            var_dump($processed);
        }
    }
}