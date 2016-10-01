<?php
namespace Ink\Tokenizers
{
    use Ink\Tokens\BacktickToken;
    use Ink\Tokens\BoldToken;
    use Ink\Tokens\ClosingBracketToken;
    use Ink\Tokens\ItalicToken;
    use Ink\Tokens\OpeningBracketToken;
    use Ink\Tokens\TextToken;
    use Ink\Tokens\TokenInterface;

    class TextTokenizer
    {
        /**
         * @var array
         */
        private $tokens = [];

        /**
         * @var string
         */
        private $position = 0;

        /**
         * @var string
         */
        private $input;

        /**
         * @var int
         */
        private $length;

        public function tokenize(string $input): array
        {
            $this->input = $input;
            $this->length = mb_strlen($input);

            while (!$this->isDone()) {
                $this->tokens[] = $this->getToken();
            }

            return $this->tokens;
        }

        private function getToken(): TokenInterface
        {
            if ($this->expect('**')) {
                return new BoldToken;
            }

            if ($this->expect('//')) {
                return new ItalicToken;
            }

            if ($this->expect('`')) {
                return new BacktickToken;
            }

            if ($this->expect('[')) {
                return new OpeningBracketToken;
            }

            if ($this->expect(']')) {
                return new ClosingBracketToken;
            }

            return new TextToken($this->take(1));
        }

        private function peek(int $length): string
        {
            return mb_substr($this->input, $this->position, $length);
        }

        private function expect(string $expected): bool
        {
            $length = mb_strlen($expected);
            $matches = ($this->peek($length) === $expected);

            if ($matches) {
                $this->next($length);
            }

            return $matches;
        }

        private function take(int $length)
        {
            $result = $this->peek($length);

            $this->next($length);

            return $result;
        }

        private function next(int $length)
        {
            $this->position += $length;
        }

        private function isDone(): bool
        {
            return $this->position === $this->length;
        }
    }
}