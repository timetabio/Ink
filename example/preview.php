<?php
namespace Ink
{
    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory;

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $transformation = $factory->createPreviewTransformation();

    $result = $transformation->apply($blocks);
    $generator = $factory->createDomGenerator();

    echo $generator->generate($result) . PHP_EOL;
}
