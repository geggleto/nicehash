<?php

include_once __DIR__ . "/../vendor/autoload.php";

if (!defined('PROFIT_RUNNER')) {
    print "#################################################\n";
    print "CRYPTO MINING PROFIT TOOL\n";
    print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
    print "#################################################\n\n";
}

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getZcash(1000000);

$cost = Crypto\Nicehash\NicehashCost::Equihash(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "ZEC - EUR\n Cost {$costPrice} BTC/MSol/Day\n Revenue: {$rev} BTC/MSol/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('ZEC-EUR', json_encode(['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/MSol/Day']));
}


$cost = Crypto\Nicehash\NicehashCost::Equihash(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "ZEC - USD\n Cost {$costPrice} BTC/MSol/Day\n Revenue: {$rev} BTC/MSol/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('ZEC-USD', json_encode(['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/MSol/Day']));
}

