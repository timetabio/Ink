<?php
namespace Ink\Parsers
{
    use Ink\Tokenizers\TextTokenizer;
    use Ink\TokenParsers\TextParser\Parser;
    use Ink\TokenParsers\TextParser\State;

    class TextParser
    {
        /**
         * @var TextTokenizer
         */
        private $textTokenizer;

        /**
         * @var Parser
         */
        private $textParser;

        public function __construct(TextTokenizer $textTokenizer, Parser $textParser)
        {
            $this->textTokenizer = $textTokenizer;
            $this->textParser = $textParser;
        }

        public function parse(string $input): array
        {
            $tokens = $this->textTokenizer->tokenize($input);
            $text = $this->textParser->parse(new State($tokens));

            return $text;
        }
    }
}