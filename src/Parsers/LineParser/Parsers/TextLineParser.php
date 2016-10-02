<?php
namespace Ink\Parsers\LineParser\Parsers
{
    use Ink\Blocks\AbstractTextBlock;
    use Ink\Blocks\CodeBlock;
    use Ink\Blocks\Paragraph;
    use Ink\Lines\LineInterface;
    use Ink\Lines\TextLine;
    use Ink\Parsers\LineParser\State;

    class TextLineParser implements LineParserInterface
    {
        public function parse(LineInterface $line, State $state)
        {
            if (!($line instanceof TextLine)) {
                return;
            }

            $current = $this->getCurrent($state);

            $current->addContent($line->getContent());

            $state->setCurrent($current);
        }

        private function getCurrent(State $state): AbstractTextBlock
        {
            $current = $state->getCurrent();

            if ($current instanceof Paragraph) {
                return $current;
            }

            if ($current instanceof CodeBlock) {
                return $current;
            }

            $state->commit();

            return new Paragraph;
        }
    }
}