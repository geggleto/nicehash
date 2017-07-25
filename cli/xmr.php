<?php

include_once __DIR__ . "/../vendor/autoload.php";

if (!defined('PROFIT_RUNNER')) {
    print "#################################################\n";
    print "CRYPTO MINING PROFIT TOOL\n";
    print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
    print "#################################################\n\n";
}

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getMonero(1000000);

$cost = Crypto\Nicehash\NicehashCost::CryptoNight(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "XMR - EUR\n Cost {$costPrice} BTC/MH/Day\n Revenue: {$rev} BTC/MH/Day\n Profit: {$profit}\n\n";


$cost = Crypto\Nicehash\NicehashCost::CryptoNight(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "XMR - USD\n Cost {$costPrice} BTC/MH/Day\n Revenue: {$rev} BTC/MH/Day\n Profit: {$profit}\n\n";

