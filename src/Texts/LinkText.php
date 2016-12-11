<?php
namespace Ink\Texts
{
    use Ink\ValueObjects\Url;

    class LinkText implements TextInterface
    {
        /**
         * @var Url
         */
        private $url;

        /**
         * @var string|null
         */
        private $label;

        public function __construct(Url $url, string $label = null)
        {
            $this->url = $url;
            $this->label = $label;
        }

        public function getUrl(): Url
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

        public function __toString(): string
        {
            if ($this->hasLabel()) {
                return $this->label;
            }

            return $this->url->getHostname();
        }
    }
}
