<?php
namespace Ink
{
    class Factory
    {
        public function createParser(): \Ink\Parser
        {
            return new \Ink\Parser($this->createBlockParser());
        }

        public function createBlockParser(): \Ink\Parsers\BlockParser
        {
            return new \Ink\Parsers\BlockParser(
                $this->createLineTokenizer(),
                $this->createLineParser()
            );
        }

        public function createTextParser(): \Ink\Parsers\TextParser
        {
            return new \Ink\Parsers\TextParser(
                $this->createTextTokenizer(),
                $this->createTextTokenParser()
            );
        }

        public function createLineTokenizer(): \Ink\Tokenizers\LineTokenizer
        {
            return new \Ink\Tokenizers\LineTokenizer;
        }

        public function createLineParser(): \Ink\TokenParsers\LineParser\Parser
        {
            $parser = new \Ink\TokenParsers\LineParser\Parser;

            $parser->registerParser(\Ink\Lines\HeadingLine::class, new \Ink\TokenParsers\LineParser\Parsers\HeadingLineParser);
            $parser->registerParser(\Ink\Lines\EmptyLine::class, new \Ink\TokenParsers\LineParser\Parsers\EmptyLineParser);
            $parser->registerParser(\Ink\Lines\TextLine::class, $this->createTextLineParser());
            $parser->registerParser(\Ink\Lines\QuoteLine::class, $this->createQuoteLineParser());
            $parser->registerParser(\Ink\Lines\UnorderedListLine::class, $this->createUnorderedListLineParser());
            $parser->registerParser(\Ink\Lines\CodeBlockLine::class, new \Ink\TokenParsers\LineParser\Parsers\CodeBlockLineParser);

            return $parser;
        }

        public function createTextLineParser(): \Ink\TokenParsers\LineParser\Parsers\TextLineParser
        {
            return new \Ink\TokenParsers\LineParser\Parsers\TextLineParser(
                $this->createTextParser()
            );
        }

        public function createQuoteLineParser(): \Ink\TokenParsers\LineParser\Parsers\QuoteLineParser
        {
            return new \Ink\TokenParsers\LineParser\Parsers\QuoteLineParser(
                $this->createTextParser()
            );
        }

        public function createUnorderedListLineParser(): \Ink\TokenParsers\LineParser\Parsers\UnorderedListLineParser
        {
            return new \Ink\TokenParsers\LineParser\Parsers\UnorderedListLineParser(
                $this->createTextParser()
            );
        }

        public function createTextTokenizer(): \Ink\Tokenizers\TextTokenizer
        {
            return new \Ink\Tokenizers\TextTokenizer;
        }

        public function createTextTokenParser(): \Ink\TokenParsers\TextParser\Parser
        {
            return new \Ink\TokenParsers\TextParser\Parser;
        }

        public function createDomGenerator(): \Ink\Generators\DomGenerator
        {
            return new \Ink\Generators\DomGenerator(
                (new \DOMImplementation())->createDocument(null, 'html')
            );
        }

        public function createJsonGenerator(): \Ink\Generators\Json\Generator
        {
            $generator = new \Ink\Generators\Json\Generator;
            $textHandler = new \Ink\Generators\Json\TextHandler;

            $generator->registerHandler(new \Ink\Generators\Json\Handlers\CodeBlockHandler);
            $generator->registerHandler(new \Ink\Generators\Json\Handlers\HeadingHandler);
            $generator->registerHandler(new \Ink\Generators\Json\Handlers\ParagraphHandler($textHandler));
            $generator->registerHandler(new \Ink\Generators\Json\Handlers\QuoteHandler($textHandler));
            $generator->registerHandler(new \Ink\Generators\Json\Handlers\UnorderedListHandler($textHandler));

            return $generator;
        }
    }
}