<?php
namespace Ink\Transformations
{
    use Ink\Blocks\AbstractTextBlock;
    use Ink\Blocks\Paragraph;
    use Ink\Texts\PlainText;

    class PreviewTransformation implements TransformationInterface
    {
        /**
         * @var int
         */
        private $maxLength;

        public function __construct(int $maxLength = 140)
        {
            $this->maxLength = $maxLength;
        }

        public function apply(array $blocks): array
        {
            /** @var AbstractTextBlock $previewBlock */
            $previewBlock = $this->getPreviewBlock($blocks);

            if ($previewBlock === null) {
                return [];
            }

            return $this->createParagraph($this->truncateWords($previewBlock));
        }

        private function truncateWords(string $input): string
        {
            $words = mb_split('[\s]+', $input);

            $result = '';

            foreach ($words as $word) {
                $currentText = trim($result . ' ' . $word);
                $currentLength = mb_strlen($currentText);

                if ($currentLength > $this->maxLength) {
                    return $result;
                }

                $result = $currentText;
            }

            return $result;
        }

        private function createParagraph(string $content): array
        {
            $paragraph = new Paragraph;
            $text = new PlainText(rtrim($content, ". \t\n\r\x0B") . '...');

            $paragraph->addText($text);

            return [$paragraph];
        }

        private function getPreviewBlock(array $blocks)
        {
            foreach ($blocks as $block) {
                if ($block instanceof AbstractTextBlock) {
                    return $block;
                }
            }

            return null;
        }
    }
}
