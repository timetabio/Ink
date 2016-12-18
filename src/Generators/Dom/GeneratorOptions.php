<?php
/**
 * (c) 2016 Ruben Schmidmeister
 */
namespace Ink\Generators\Dom
{
    class GeneratorOptions
    {
        /**
         * @var bool
         */
        private $noFollow;

        public function __construct(bool $noFollow = true)
        {
            $this->noFollow = $noFollow;
        }

        public function isNoFollow(): bool
        {
            return $this->noFollow;
        }
    }
}
