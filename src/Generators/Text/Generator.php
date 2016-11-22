<?php
namespace Ink\Generators\Text
{
    class Generator implements \Ink\Generators\Generator
    {
        public function generate(array $blocks): \Ink\Generators\GeneratorResult
        {
            return new GeneratorResult(implode(PHP_EOL . PHP_EOL, $blocks));
        }
    }
}
