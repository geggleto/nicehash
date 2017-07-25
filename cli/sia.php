<?php

include __DIR__ . "/../vendor/autoload.php";

print "#################################################\n";
print "CRYPTO MINING PROFIT TOOL\n";
print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
print "#################################################\n\n";

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getSia(1000000);

$cost = Crypto\Nicehash\NicehashCost::Sia(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "SiaCoin - EUR\n Cost {$costPrice} BTC/TH/Day\n Revenue: {$rev} BTC/TH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::Sia(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
print "SiaCoin - USD\n Cost {$costPrice} BTC/TH/Day\n Revenue: {$rev} BTC/TH/Day\n Profit: {$profit}\n\n";

