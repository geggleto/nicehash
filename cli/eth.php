<?php

include __DIR__ . "/../vendor/autoload.php";

print "#################################################\n";
print "CRYPTO MINING PROFIT TOOL\n";
print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
print "#################################################\n\n";

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getEthereum(1000);

$cost = Crypto\Nicehash\NicehashCost::DaggerHasmimoto(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "DaggerHashimoto EUR\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::DaggerHasmimoto(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "DaggerHashimoto USD\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";

