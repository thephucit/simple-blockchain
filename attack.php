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

/*================================================*/


echo "\nChanging second block...\n";
$blockChain->chain[1]->data = "amount: 1000";
$blockChain->chain[1]->hash = $blockChain->chain[1]->hash();

echo json_encode($blockChain, JSON_PRETTY_PRINT);
echo "\nChain valid: ".($blockChain->isValid() ? "true" : "false")."\n";