<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require __DIR__ . '/../vendor/autoload.php';

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '../../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    echo 'error 404';
    http_response_code(404);
    exit();
}

session_start();

$loginRoute = strpos($caminho, 'login');

$registerRoute = strpos($caminho, 'register');

if (!isset($_SESSION['logged']) && $loginRoute === false && $registerRoute === false) {
    header('Location: /login');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);

$response = $controlador->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
