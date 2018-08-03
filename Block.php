<?php

class Block
{
    public $nonce;

    public function __construct($index, $timestamp, $data, $prevHash = null)
    {
        $this->index     = $index;
        $this->nonce     = 0;
        $this->timestamp = $timestamp;
        $this->data      = $data;
        $this->prevHash  = $prevHash;
        $this->hash      = $this->hash();
    }

    public function hash()
    {
        // kecca
        return hash("sha256", $this->index.$this->prevHash.$this->timestamp.((string)$this->data).$this->nonce);
    }
}