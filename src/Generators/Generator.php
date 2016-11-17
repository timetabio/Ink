<?php

namespace Ink\Generators
{

    interface Generator
    {
        public function generate(array $block): \Ink\Generators\GeneratorResult;
    }
}
