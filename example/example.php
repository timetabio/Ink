<?php
namespace Ink
{
    use Ink\Tokenizers\TextTokenizer;

    require __DIR__ . '/../src/autoload.php';

    $factory = new Factory();

    $parser = $factory->createParser();
    $blocks = $parser->parse(file_get_contents(__DIR__ . '/example.txt'));

    $generator = $factory->createDomGenerator();
    $document = $generator->generate($blocks);

    $textTokenizer = new TextTokenizer;
    $result = $textTokenizer->tokenize('here comes `some **bold text** inside` and some **bold text** and some //italic// text, but this ** is plain text');

    $textParser = new \Ink\Parsers\TextParser\Parser();
    $texts = $textParser->parse(new \Ink\Parsers\TextParser\State($result));

    var_dump($texts);
}