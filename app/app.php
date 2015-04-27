<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Providers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Controllers
$app->mount('/', new App\Controllers\IndexController());

return $app;
