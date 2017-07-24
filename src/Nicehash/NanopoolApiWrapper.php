<?php


namespace Crypto\Nicehash;


class NanopoolApiWrapper
{
    private $endPoint;

    public function __construct()
    {
        $this->endPoint = '';
    }

    /**
     * Hashrate in MH/s
     * @param int $hashRate
     * @return float
     */
    public function getEthereum($hashRate = 0)
    {
        $endpoint = 'https://api.nanopool.org/v1/eth/approximated_earnings/'.$hashRate;
        $results = json_decode(file_get_contents($endpoint),true);

        return round((float)$results['data']['day']['bitcoins'], 6);
    }

    /**
     * Hashrate in H/s
     * @param int $hashRate
     * @return float
     */
    public function getMonero($hashRate = 0)
    {
        $endpoint = 'https://api.nanopool.org/v1/xmr/approximated_earnings/'.$hashRate;
        $results = json_decode(file_get_contents($endpoint),true);

        return round((float)$results['data']['day']['bitcoins'], 6);
    }
}