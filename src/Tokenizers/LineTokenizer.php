<?php
namespace Ink\Tokenizers
{
    use Ink\Lines\CodeBlockLine;
    use Ink\Lines\EmptyLine;
    use Ink\Lines\HeadingLine;
    use Ink\Lines\LineInterface;
    use Ink\Lines\QuoteLine;
    use Ink\Lines\TextLine;
    use Ink\Lines\UnorderedListLine;

    class LineTokenizer
    {
        public function tokenize(string $input): array
        {
            $lines = explode(PHP_EOL, $input);
            $processedLines = [];

            foreach ($lines as $line) {
                $processedLines[] = $this->processLine($line);
            }

            return $processedLines;
        }

        private function processLine(string $line): LineInterface
        {
            $firstChar = mb_substr($line, 0, 1);

            if ($firstChar === '>') {
                return new QuoteLine(mb_substr($line, 1));
            }

            if ($firstChar === '-') {
                return new UnorderedListLine(mb_substr($line, 1));
            }

            if (mb_substr($line, 0, 3) === '###') {
                return new HeadingLine(3, mb_substr($line, 3));
            }

            if (mb_substr($line, 0, 2) === '##') {
                return new HeadingLine(2, mb_substr($line, 2));
            }

            if ($firstChar === '#') {
                return new HeadingLine(1, mb_substr($line, 1));
            }

            if (mb_substr($line, 0, 4) === '```') {
                return new CodeBlockLine;
            }

            if (mb_strlen($line) === 0) {
                return new EmptyLine;
            }

            return new TextLine($line);
        }
    }
}