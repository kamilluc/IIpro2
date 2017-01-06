<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 07.11.2016
 * Time: 01:53
 */

namespace AppBundle\Controller;


use AppBundle\Entity\users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class KamilController extends Controller
{


    /**
     * @Route("/kamil/users")
     */
    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $users=$em->getRepository('AppBundle\Entity\users')->findAll();
        return $this->render('kamil/list.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/kamil/new/{imie}/{password}")
     */
    public function newAction($imie, $password){
        $user = new users();

        $user->setPassword($password);
        $user->setLogin($imie);

        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Uzytkownik zostal dodany!');
    }

    /**
     * @Route("/kamil/showuser/{kamilName}")
     */
    public function showAction($kamilName){
        /*
        $templating = $this->container->get('templating');
        $html=$templating->render('kamil/show.html.twig', ['name' => $kamilName]);
        return new Response($html);
        */
        return $this->render('kamil/show.html.twig', ['name' =>$kamilName]);
    }
}