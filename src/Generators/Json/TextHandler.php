<?php
namespace Ink\Generators\Json
{
    use Ink\Texts\PlainText;
    use Ink\Texts\StyledText;
    use Ink\Texts\TextInterface;

    class TextHandler
    {
        public function handle(array $texts)
        {
            return array_map([$this, 'handleText'], $texts);
        }

        private function handleText(TextInterface $text): array
        {
            if ($text instanceof PlainText) {
                return ['text' => $text->getText()];
            }

            if ($text instanceof StyledText) {
                return [
                    'style' => (string) $text->getStyle(),
                    'content' => $this->handle($text->getContent())
                ];
            }

            throw new \RuntimeException('unknown text instance');
        }
    }
}