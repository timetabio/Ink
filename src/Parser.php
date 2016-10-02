<?php
namespace Ink
{
    use Ink\Parsers\BlockParser;

    class Parser
    {
        /**
         * @var BlockParser
         */
        private $blockParser;

        public function __construct(BlockParser $blockParser)
        {
            $this->blockParser = $blockParser;
        }

        public function parse(string $input): array
        {
            return $this->blockParser->parse($input);
        }
    }
}