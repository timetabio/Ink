<?php

namespace Ink\Generators\Dom
{

    class GeneratorResult implements \Ink\Generators\GeneratorResult
    {
        /**
         * @var \DOMDocument
         */
        private $document;

        public function __construct(\DOMDocument $document)
        {
            $this->document = $document;
        }

        public function getDocument(): \DOMDocument
        {
            return $this->document;
        }

        public function __toString(): string
        {
            return $this->document->saveHTML();
        }
    }
}
