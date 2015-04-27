<?php

namespace App\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $app->get('/', 'App\Controllers\IndexController::index')->bind('homepage');

        return $controllers;
    }

    public function index(Application $app)
    {
        return $app['twig']->render('index.twig');
    }
}
