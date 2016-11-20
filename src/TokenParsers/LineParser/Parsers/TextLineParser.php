<?php
namespace Ink\TokenParsers\LineParser\Parsers
{
    use Ink\Blocks\AbstractTextBlock;
    use Ink\Blocks\CodeBlock;
    use Ink\Blocks\Paragraph;
    use Ink\Lines\LineInterface;
    use Ink\Lines\TextLine;
    use Ink\Parsers\TextParser;
    use Ink\TokenParsers\LineParser\State;

    class TextLineParser implements LineParserInterface
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
            if (!($line instanceof TextLine)) {
                return;
            }

            $this->handleParagraph($line, $state);
        }

        private function handleParagraph(TextLine $line, State $state)
        {
            $current = $this->getCurrent($state);
            $texts = $this->textParser->parse($line->getContent());

            $current->addLine($texts);

            $state->setCurrent($current);
        }

        private function getCurrent(State $state): AbstractTextBlock
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
