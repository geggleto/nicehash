<?php

use Slim\Http\Request;
use Slim\Http\Response;

include __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__.'/../templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

$app->get('/', function(Request $req, Response $res, $args) {
    $stats = (new \Crypto\Services\GetCryptoStats())->getStats();
    return $this->view->render($res, "index.twig", ['stats' => $stats]);
});

$app->get('/stats.json', function(Request $req, Response $res, $args) {
    return $res->withJson((new \Crypto\Services\GetCryptoStats())->getStats());
});

$app->run();