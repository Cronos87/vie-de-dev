<?php

require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();

// Providers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));

// Controllers
$app->mount('/', new App\Controllers\IndexController());
$app->mount('/admin', new App\Controllers\AdminController());




return $app;
