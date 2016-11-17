<?php
namespace Ink\Generators\Json
{
    class GeneratorResult implements \Ink\Generators\GeneratorResult
    {
        /**
         * @var array
         */
        private $json;

        public function __construct(array $json)
        {
            $this->json = $json;
        }

        public function getJson(): array
        {
            return $this->json;
        }

        public function __toString(): string
        {
            return json_encode($this->json);
        }
    }
}
