<?php
namespace Ink
{
    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory;

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $document = new \DOMDocument;
    $generator = $factory->createDomGenerator($document);

    $fragment = $generator->generate($blocks);

    echo $document->saveHTML($fragment) . PHP_EOL;
}
