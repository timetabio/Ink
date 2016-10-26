<?php
namespace Ink\Texts
{
    class LinkText implements TextInterface
    {
        /**
         * @var string
         */
        private $url;

        /**
         * @var string|null
         */
        private $label;

        public function __construct(string $url, string $label = null)
        {
            $this->url = $url;
            $this->label = $label;
        }

        public function getUrl(): string
        {
            return $this->url;
        }

        public function hasLabel(): bool
        {
            return $this->label !== null;
        }

        public function getLabel(): string
        {
            return $this->label;
        }
    }
}
