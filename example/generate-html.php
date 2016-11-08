<?php
namespace Ink
{
    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory;

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $generator = $factory->createDomGenerator();
    $fragment = $generator->generate($blocks);

    echo $fragment->ownerDocument->saveHTML($fragment) . PHP_EOL;
}
