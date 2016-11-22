<?php
namespace Ink\Generators\Text
{
    class GeneratorResult implements \Ink\Generators\GeneratorResult
    {
        /**
         * @var string
         */
        private $result;

        public function __construct(string $result)
        {
            $this->result = $result;
        }

        public function __toString(): string
        {
            return $this->result;
        }
    }
}
