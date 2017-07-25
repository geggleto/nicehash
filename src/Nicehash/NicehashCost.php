<?php


namespace Crypto\Nicehash;


class NicehashCost
{
    protected $nhOrders;

    protected $noWorkerOrders;
    private $endPoint;
    private $priceFactor;

    public function __construct($endPoint, $priceFactor)
    {
        $json = file_get_contents($endPoint);

        $this->nhOrders = json_decode($json, true);

        $this->init();

        $this->endPoint = $endPoint;
        $this->priceFactor = $priceFactor;
    }

    protected function init()
    {
        $this->noWorkerOrders = $this->filterStandardWithWorkers($this->nhOrders);

        usort($this->noWorkerOrders, [$this, 'compare']);
    }

    public function getNoWorkerOrderCount() {
        return count($this->noWorkerOrders);
    }

    public function getFloorOrderPrice() {
        return $this->noWorkerOrders[count($this->noWorkerOrders) - 1]['price'] * $this->priceFactor;
    }

    private function compare($a, $b) {
        if ($a['price'] === $b['price']) {
            return 0;
        }

        return ($a['price'] > $b['price']) ? -1 : 1;
    }

    public function filterStandardWithWorkers(array $array)
    {
        return array_filter($array['result']['orders'], function ($row) {
            return ($row['type'] === 0 && $row['alive'] === true && $row['accepted_speed'] > 0 && $row['workers'] > 0);
        });
    }

    //20
    public static function DaggerHasmimoto($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=20', $priceFactor);
    }

    //24
    public static function Equihash($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=24', $priceFactor);
    }

    //
    public static function Lbry($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=23', $priceFactor);
    }

    //27
    public static function Sia($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=27', $priceFactor);
    }

    //22
    public static function CryptoNight($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=22', $priceFactor);
    }

    //25
    public static function Pascal($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=25', $priceFactor);
    }

    //1
    public static function Btc($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=1', $priceFactor);
    }

    //0
    public static function Litecoin($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=0', $priceFactor);
    }

    //0
    public static function Dash($location = 1, $priceFactor = 1) {
        return new self('https://api.nicehash.com/api?method=orders.get&location='.$location.'&algo=3', $priceFactor);
    }
}