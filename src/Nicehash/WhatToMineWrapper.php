<?php
namespace Crypto\Nicehash;


class WhatToMineWrapper
{
    /**
     * In GHs
     * @param $hashrate
     * @return float
     */
    public function getBtc($hashrate)
    {
        $revenue = json_decode(file_get_contents("http://whattomine.com/coins/1-btc-sha-256.json?utf8=%E2%9C%93&hr={$hashrate}&p=0&fee=0.0&cost=0.1&hcost=0.0&commit=Calculate"), true);

        return round($revenue['btc_revenue'], 6);
    }

    /**
     * In GHs
     * @param $hashrate
     * @return float
     */
    public function getLitecoin($hashrate)
    {
        $revenue = json_decode(file_get_contents("http://whattomine.com/coins/4-ltc-scrypt.json?utf8=%E2%9C%93&hr={$hashrate}&p=0&fee=0.0&cost=0.1&hcost=0.0&commit=Calculate"), true);

        return round($revenue['btc_revenue'], 6);
    }


    /**
     * In GHs
     * @param $hashrate
     * @return float
     */
    public function getDash($hashrate)
    {
        $revenue = json_decode(file_get_contents("http://whattomine.com/coins/34-dash-x11.json?utf8=%E2%9C%93&hr={$hashrate}&p=0&fee=0.0&cost=0.1&hcost=0.0&commit=Calculate"), true);

        return round($revenue['btc_revenue'], 6);
    }
}