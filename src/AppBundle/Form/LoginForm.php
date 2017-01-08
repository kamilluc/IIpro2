<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 06.01.2017
 * Time: 15:23
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

//use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class LoginForm extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('_username')
        ->add('_password', PasswordType::class)
        ;
}
}