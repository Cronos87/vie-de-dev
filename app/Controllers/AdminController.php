<?php

namespace App\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class AdminController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $app->get('/admin/add', 'App\Controllers\AdminController::add')->bind('admin-add');

        return $controllers;
    }

    public function add(Application $app)
    {
        $form = (new \App\Forms\Admin\AddForm($app))->getForm();

        if($form->isValid()){

        }

        return $app['twig']->render('admin/add.twig',array('form' => $form->createView()));
    }
}
