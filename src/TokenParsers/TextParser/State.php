<?php
namespace Ink\TokenParsers\TextParser
{
    use Ink\Texts\PlainText;
    use Ink\Texts\TextInterface;
    use Ink\Tokens\TokenInterface;

    class State
    {
        /**
         * @var int
         */
        private $current = 0;

        /**
         * @var TokenInterface[]
         */
        private $input;

        /**
         * @var array
         */
        private $texts = [];

        /**
         * @var TextInterface
         */
        private $currentText;

        /**
         * @var int
         */
        private $total;

        public function __construct(array $input)
        {
            $this->input = $input;
            $this->total = count($input);
        }

        public function next(int $length = 1)
        {
            $this->current += $length;
        }

        /**
         * Collects all tokens from the current position until a token of type $type is found.
         * Returns null if no such token is found
         */
        public function getUntil(string $type)
        {
            $tokens = [];

            for ($i = $this->current; $i < $this->total; $i++) {
                $token = $this->input[$i];

                if ($token instanceof $type) {
                    return $tokens;
                }

                $tokens[] = $token;
            }

            return null;
        }

        public function getCurrent(): int
        {
            return $this->current;
        }

        public function getCurrentToken()
        {
            if (!isset($this->input[$this->current])) {
                return null;
            }

            return $this->input[$this->current];
        }

        public function getNextToken()
        {
            return $this->input[$this->current + 1];
        }

        public function getTexts(): array
        {
            return $this->texts;
        }

        public function addText(TextInterface $text)
        {
            $current = $this->currentText;

            // merge plain texts together
            if ($text instanceof PlainText && $current instanceof PlainText) {
                $current->addText($text->getText());
                return;
            }

            $this->texts[] = $text;
            $this->currentText = $text;
        }
    }
}