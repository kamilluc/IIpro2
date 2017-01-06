<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 04.12.2016
 * Time: 22:00
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/kamil/login", name="security_login")
     */
public function loginAction(){
    $authenticationUtils = $this->get('security.authentication_utils');
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();
    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    return $this->render(
        'security/login.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        )
    );

}


    /**
     * @Route("/kamil/main")
     */

    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $msgs=$em->getRepository('AppBundle\Entity\msgs')->findAll();
        return $this->render('maincontent/msg.html.twig', ['msgs' => $msgs]);
    }

}