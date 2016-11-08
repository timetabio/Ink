<?php
namespace Ink\Generators\Dom\BlockRenderers
{
    use Ink\Blocks\BlockInterface;

    class CodeBlockRenderer implements BlockRendererInterface
    {
        public function render(\DOMDocument $document, BlockInterface $block): \DOMElement
        {
            /** @var \Ink\Blocks\CodeBlock $block */

            $preElement = $document->createElement('pre');

            $codeElement = $document->createElement('code');
            $codeElement->appendChild($document->createTextNode($block->getImplodedLines()));

            $preElement->appendChild($codeElement);

            return $preElement;
        }

        public function getType(): string
        {
            return \Ink\Blocks\CodeBlock::class;
        }
    }
}
