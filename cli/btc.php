<?php

include __DIR__ . "/../vendor/autoload.php";

print "#################################################\n";
print "CRYPTO MINING PROFIT TOOL\n";
print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
print "#################################################\n\n";

$whatToMine = new \Crypto\Nicehash\WhatToMineWrapper();
$rev = $whatToMine->getBtc(1000000);

$cost = Crypto\Nicehash\NicehashCost::Btc(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "BTC - EUR\n Cost {$costPrice} BTC/PH/Day\n Revenue: {$rev} BTC/PH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::Btc(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "BTC - USD\n Cost {$costPrice} BTC/PH/Day\n Revenue: {$rev} BTC/PH/Day\n Profit: {$profit}\n\n";

