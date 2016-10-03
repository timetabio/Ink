<?php
namespace Ink\TokenParsers\TextParser
{
    use Ink\Texts\PlainText;
    use Ink\Texts\StyledText;
    use Ink\Texts\TextInterface;
    use Ink\Tokens\FormatTokenInterface;
    use Ink\Tokens\TextToken;
    use Ink\Tokens\TokenInterface;

    class Parser
    {
        public function parse(State $state): array
        {
            while (($token = $state->getCurrentToken())) {
                $state->addText(
                    $this->handleToken($token, $state)
                );

                $state->next();
            }

            return $state->getTexts();
        }

        private function handleToken(TokenInterface $token, State $state): TextInterface
        {
            if ($token instanceof TextToken) {
                return new PlainText($token);
            }

            // this shouldn't happen
            if (!($token instanceof FormatTokenInterface)) {
                return new PlainText($token);
            }

            $next = $state->getNextToken();

            // ignore the token if there's a space afterwards
            if (!($next instanceof TextToken) || (string) $next === ' ') {
                return new PlainText($token);
            }

            // find all the tokens between the current and the closing token
            $tokens = $state->getUntil(get_class($token));

            // if no closing token is found, we add a string representation of the token
            if ($tokens === null) {
                return new PlainText($token);
            }

            // move the cursor to the closing token
            $state->next(count($tokens) + 1);

            $text = new StyledText($token->getTextStyle());

            // parse the contents of this formatted text
            $text->setContent($this->parse(new State($tokens)));

            return $text;
        }
    }
}