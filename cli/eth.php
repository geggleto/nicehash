<?php

include_once __DIR__ . "/../vendor/autoload.php";

if (!defined('PROFIT_RUNNER')) {
    print "#################################################\n";
    print "CRYPTO MINING PROFIT TOOL\n";
    print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
    print "#################################################\n\n";
}

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getEthereum(1000);

$cost = Crypto\Nicehash\NicehashCost::DaggerHasmimoto(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "ETH - EUR\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('ETH-EUR', ['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/PH/Day']);
}


$cost = Crypto\Nicehash\NicehashCost::DaggerHasmimoto(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "ETH - USD\n Cost {$costPrice} BTC/GH/Day\n Revenue: {$rev} BTC/GH/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('ETH-USD', ['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/PH/Day']);
}

