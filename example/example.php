<?php
namespace Ink
{
    use Ink\Lines\EmptyLine;
    use Ink\Lines\HeadingLine;
    use Ink\Lines\QuoteLine;
    use Ink\Lines\TextLine;
    use Ink\Lines\UnorderedListLine;
    use Ink\Parsers\LineParsers\EmptyLineParser;
    use Ink\Parsers\LineParsers\HeadingLineParser;
    use Ink\Parsers\LineParsers\QuoteLineParser;
    use Ink\Parsers\LineParsers\TextLineParser;
    use Ink\Parsers\LineParsers\UnorderedListLineParser;
    use Ink\Tokenizers\LineTokenizer;

    require __DIR__ . '/../src/autoload.php';

    $lineParser = new \Ink\Parsers\LineParser\Parser;

    $lineParser->registerParser(HeadingLine::class, new HeadingLineParser);
    $lineParser->registerParser(EmptyLine::class, new EmptyLineParser);
    $lineParser->registerParser(TextLine::class, new TextLineParser);
    $lineParser->registerParser(QuoteLine::class, new QuoteLineParser);
    $lineParser->registerParser(UnorderedListLine::class, new UnorderedListLineParser);

    $parser = new Parser(new LineTokenizer(), $lineParser);

    $parser->parse(file_get_contents(__DIR__ . '/example.txt'));
}