<?php
namespace Ink\Texts
{
    use Ink\TextStyles\TextStyleInterface;

    class StyledText implements TextInterface
    {
        /**
         * @var TextStyleInterface
         */
        private $style;

        /**
         * @var TextInterface[]
         */
        private $content = [];

        public function __construct(TextStyleInterface $style)
        {
            $this->style = $style;
        }

        public function getStyle(): TextStyleInterface
        {
            return $this->style;
        }

        public function getContent(): array
        {
            return $this->content;
        }

        public function setContent(array $content)
        {
            $this->content = $content;
        }
    }
}