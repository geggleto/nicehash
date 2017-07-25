<?php

include_once __DIR__ . "/../vendor/autoload.php";

if (!defined('PROFIT_RUNNER')) {
    print "#################################################\n";
    print "CRYPTO MINING PROFIT TOOL\n";
    print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
    print "#################################################\n\n";
}

$whatToMine = new \Crypto\Nicehash\WhatToMineWrapper();
$rev = $whatToMine->getLitecoin(1000);

$cost = Crypto\Nicehash\NicehashCost::Litecoin(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "LTC - EUR\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::Litecoin(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "LTC - USD\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";

