<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 08.01.2017
 * Time: 12:12
 */

namespace AppBundle\Security;


use AppBundle\Form\LoginForm;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
//use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
private $em;
private $router;
private $formFactory;
    public function _construct(FormFactoryInterface $formFactory, EntityManager $em, RouterInterface $router){
        $this->formFactory=$formFactory;
        $this->em=$em;
        $this->router=$router;
    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
        if (!$isLoginSubmit) {
            // skip authentication
            return;
        }
        $form=$this->formFactory->create(LoginForm::class);
        $form->handleRequest($request);

        $data=$form->getData();
        $request->getSession()->set(Security::LAST_USERNAME, $data['_username']);
        return $data;
        // TODO: Implement getCredentials() method.
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $useraname=$credentials['_username'];
        return $this->em->getRepository('AppBundle:User')->findOneBy(['name'=>$useraname]);

        // TODO: Implement getUser() method.
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $password=$credentials['_password'];
        if ($password == 'iliketurtles') {
            return true;
        }
        return false;
        // TODO: Implement checkCredentials() method.
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('security_login');
        // TODO: Implement getLoginUrl() method.
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('homepage');

        // TODO: Implement getLoginUrl() method.
    }

}