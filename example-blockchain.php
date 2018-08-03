<?php

require_once('./BlockChain.php');

$blockChain = new BlockChain();

$blockChain->addBlock(new Block(
    1,
    strtotime('now'),
    'amount: 1'
));

$blockChain->addBlock(new Block(
    2,
    strtotime('now'),
    'amount: 2'
));

echo json_encode($blockChain, JSON_PRETTY_PRINT);
