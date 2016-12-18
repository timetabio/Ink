<?php
namespace Ink
{
    use Ink\Generators\Dom\GeneratorOptions;

    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory;

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $generator = $factory->createDomGenerator(new GeneratorOptions);

    $result = $generator->generate($blocks);

    echo (string) $result . PHP_EOL;
}
