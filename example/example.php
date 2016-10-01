<?php
namespace Ink
{
    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory();

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $generator = $factory->createDomGenerator();
    $document = $generator->generate($blocks);

    echo $document->saveHTML();
}