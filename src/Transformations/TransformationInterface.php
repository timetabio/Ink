<?php
namespace Ink\Transformations
{
    interface TransformationInterface
    {
        public function apply(array $blocks): array;
    }
}
