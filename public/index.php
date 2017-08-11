<?php

use Slim\Http\Request;
use Slim\Http\Response;

include __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function(Request $req, Response $res, $args) {

    $predis = new Predis\Client();

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

    return $res->withJson($pairs);
});

$app->run();