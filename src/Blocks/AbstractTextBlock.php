<?php
namespace Ink\Blocks
{
    use Ink\Texts\PlainText;
    use Ink\Texts\TextInterface;

    abstract class AbstractTextBlock implements BlockInterface
    {
        /**
         * @var TextInterface[]
         */
        private $text = [];

        public function addText(TextInterface $text)
        {
            $this->text[] = $text;
        }

        public function addLine(array $texts)
        {
            if (isset($this->text[0])) {
                $this->addText(new PlainText(' '));
            }

            foreach ($texts as $text) {
                $this->addText($text);
            }
        }

        public function getText(): array
        {
            return $this->text;
        }
    }
}