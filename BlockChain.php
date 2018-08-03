<?php

require_once('./Block.php');

class BlockChain
{

    public function __construct()
    {
        $this->chain      = [$this->genesisBlock()];
        // $this->difficulty = 5;
        /**
         * difficulty = 2 => 0.001s
         * difficulty = 3 => 0.5s
         * difficulty = 4 => 3s
         * difficulty = 5 => 20s
         */
    }

    public function genesisBlock()
    {
        return new Block(0, strtotime('2012-01-01'), 'Genesis Block');
    }

    public function lastBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock(Block $block)
    {
        $block->prevHash = $this->lastBlock()->hash;
        // $this->mine($block);
        $this->chain[]   = $block;
    }

    public function mine(Block $block)
    {
        echo "mining block {$block->index} \n";

        while (substr($block->hash, 0, $this->difficulty) !== str_repeat('0', $this->difficulty)) {
            $block->nonce++;
            $block->hash = $block->hash();
        }
    }

    public function isValid()
    {
        $flag       = true;
        $totalChain = count($this->chain);
        for ($i = 1; $i < $totalChain; $i++) {
            $currBlock = $this->chain[$i];
            $prevBlock = $this->chain[$i - 1];

            if ($currBlock->hash != $currBlock->hash()) {
                $flag = false;
                break;
            }

            if ($currBlock->prevHash != $prevBlock->hash) {
                $flag = false;
                break;
            }
        }

        return $flag;
    }

}