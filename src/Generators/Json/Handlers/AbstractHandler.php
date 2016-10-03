<?php
namespace Ink\Generators\Json\Handlers
{
    use Ink\Generators\Json\TextHandler;

    abstract class AbstractHandler implements HandlerInterface
    {
        /**
         * @var TextHandler
         */
        private $textHandler;

        public function __construct(TextHandler $textHandler)
        {
            $this->textHandler = $textHandler;
        }

        protected function getTextHandler(): TextHandler
        {
            return $this->textHandler;
        }
    }
}