<?php

include_once __DIR__ . "/../vendor/autoload.php";

if (!defined('PROFIT_RUNNER')) {
    print "#################################################\n";
    print "CRYPTO MINING PROFIT TOOL\n";
    print "Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC\n";
    print "#################################################\n\n";
}

$nanopool = new \Crypto\Nicehash\NanopoolApiWrapper();
$rev = $nanopool->getPascal(1000000);

$cost = Crypto\Nicehash\NicehashCost::Pascal(0);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "Pascal - EUR\n Cost {$costPrice} BTC/TH/Day\n Revenue: {$rev} BTC/TH/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('PASC-EUR', ['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/PH/Day']);
}


$cost = Crypto\Nicehash\NicehashCost::Pascal(1);
$costPrice = $cost->getFloorOrderPrice();
$profit = $rev-$costPrice;
if (!defined('PROFIT_RUNNER') || $profit>0)
print "Pascal - USD\n Cost {$costPrice} BTC/TH/Day\n Revenue: {$rev} BTC/TH/Day\n Profit: {$profit}\n\n";
if (isset($predis)) {
    $predis->set('PASC-USD', ['cost' => $costPrice, 'revenue' => $rev, 'profit' => $profit, 'unit' => 'BTC/PH/Day']);
}

