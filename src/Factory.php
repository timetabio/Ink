<?php
namespace Ink
{
    class Factory
    {
        public function createParser(): \Ink\Parser
        {
            return new \Ink\Parser(
                $this->createLineTokenizer(),
                $this->createLineParser()
            );
        }

        public function createLineTokenizer(): \Ink\Tokenizers\LineTokenizer
        {
            return new \Ink\Tokenizers\LineTokenizer;
        }

        public function createLineParser(): \Ink\Parsers\LineParser\Parser
        {
            $parser = new \Ink\Parsers\LineParser\Parser;

            $parser->registerParser(\Ink\Lines\HeadingLine::class, new \Ink\Parsers\LineParser\Parsers\HeadingLineParser);
            $parser->registerParser(\Ink\Lines\EmptyLine::class, new \Ink\Parsers\LineParser\Parsers\EmptyLineParser);
            $parser->registerParser(\Ink\Lines\TextLine::class, new \Ink\Parsers\LineParser\Parsers\TextLineParser);
            $parser->registerParser(\Ink\Lines\QuoteLine::class, new \Ink\Parsers\LineParser\Parsers\QuoteLineParser);
            $parser->registerParser(\Ink\Lines\UnorderedListLine::class, new \Ink\Parsers\LineParser\Parsers\UnorderedListLineParser);
            $parser->registerParser(\Ink\Lines\CodeBlockLine::class, new \Ink\Parsers\LineParser\Parsers\CodeBlockLineParser);

            return $parser;
        }

        public function createDomGenerator(): \Ink\Generators\DomGenerator
        {
            return new \Ink\Generators\DomGenerator(
                (new \DOMImplementation())->createDocument(null, 'html')
            );
        }
    }
}