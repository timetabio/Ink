<?php
namespace Ink\Blocks
{
    class CodeBlock implements BlockInterface
    {
        /**
         * @var array
         */
        private $lines = [];

        public function addLine(string $line)
        {
            $this->lines[] = $line;
        }

        public function getLines(): array
        {
            return $this->lines;
        }

        public function getImplodedLines(): string
        {
            return implode(PHP_EOL, $this->lines);
        }
    }
}
