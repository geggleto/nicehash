<?php


namespace Crypto\Services;


class GetCryptoStats
{
    public function getStats()
    {
        $predis = new \Predis\Client();

        //Pull Stats from Redis
        $currencies = [
            'btc', 'dash', 'etc', 'eth', 'ltc', 'pasc', 'sia', 'xmr', 'zec'
        ];

        $pairs=[];

        foreach ($currencies as $currency) {
            $index = [
                strtoupper($currency) ."-EUR",
                strtoupper($currency) ."-USD",
            ];

            foreach ($index as $pair) {
                $pairs[$pair] =  json_decode($predis->get($pair), true);
            }
        }

        return $pairs;
    }
}