<?php
namespace Ink
{
    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory;

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $generator = $factory->createJsonGenerator();

    echo json_encode($generator->generate($blocks), JSON_PRETTY_PRINT) . PHP_EOL;
}