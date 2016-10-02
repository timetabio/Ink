<?php
namespace Ink\TokenParsers\LineParser
{
    use Ink\Blocks\BlockInterface;

    class State
    {
        /**
         * @var array
         */
        private $result = [];

        /**
         * @var BlockInterface|null
         */
        private $current;

        public function getResult(): array
        {
            return $this->result;
        }

        public function getCurrent()
        {
            return $this->current;
        }

        public function setCurrent(BlockInterface $block)
        {
            $this->current = $block;
        }

        public function commit()
        {
            if ($this->current === null) {
                return;
            }

            $this->result[] = $this->current;
            $this->current = null;
        }

        public function push(BlockInterface $block)
        {
            $this->commit();

            $this->result[] = $block;
        }
    }
}