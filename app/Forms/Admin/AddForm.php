<?php
/**
 * Created by PhpStorm.
 * User: jforissier
 * Date: 11.05.15
 * Time: 13:25
 */
namespace App\Forms\Admin;

use Silex\Application;
use Symfony\Component\Validator\Constraints as Assert;

class AddForm
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getForm()
    {
        return $this->app['form.factory']->createBuilder('form')
            ->add('name', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
            ))
            ->add('email', 'text', array(
                'constraints' => new Assert\Email()
            ))
            ->add('gender', 'choice', array(
                'choices' => array(1 => 'male', 2 => 'female'),
                'expanded' => true,
                'constraints' => new Assert\Choice(array(1, 2)),
            ))
            ->getForm();
    }
}