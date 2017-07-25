<?php

include __DIR__ . "/../vendor/autoload.php";

print "#################################################\n";
print "CRYPTO MINING PROFIT TOOL\n";
print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
print "#################################################\n\n";

$whatToMine = new \Crypto\Nicehash\WhatToMineWrapper();
$rev = $whatToMine->getDash(1000);

$cost = Crypto\Nicehash\NicehashCost::Dash(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "Dash - EUR\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::Dash(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "Dash - USD\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";

