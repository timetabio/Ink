<?php
namespace Ink\Generators\Json
{
    use Ink\Texts\TextInterface;

    class TextHandler
    {
        public function handle(array $texts)
        {
            return array_map([$this, 'handleText'], $texts);
        }

        private function handleText(TextInterface $text): array
        {
            switch (get_class($text)) {
                case \Ink\Texts\PlainText::class:
                    return $this->handlePlainText($text);
                case \Ink\Texts\StyledText::class:
                    return $this->handleStyledText($text);
                case \Ink\Texts\LinkText::class:
                    return $this->handleLink($text);
            }

            throw new \RuntimeException('unknown text instance');
        }

        private function handlePlainText(\Ink\Texts\PlainText $text): array
        {
            return ['text' => $text->getText()];
        }

        private function handleStyledText(\Ink\Texts\StyledText $text): array
        {
            return [
                'style' => (string) $text->getStyle(),
                'content' => $this->handle($text->getContent())
            ];
        }

        private function handleLink(\Ink\Texts\LinkText $link): array
        {
            $result = ['url' => $link->getUrl()];

            if ($link->hasLabel()) {
                $result['label'] = $link->getLabel();
            }

            return $result;
        }
    }
}