<?php
namespace Ink\Generators
{
    interface Generator
    {
        public function generate(array $blocks): \Ink\Generators\GeneratorResult;
    }
}
