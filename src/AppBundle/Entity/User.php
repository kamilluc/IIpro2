<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 04.12.2016
 * Time: 21:45
 */

namespace AppBundle\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    //private $pass;
    public function getRoles()
    {
        return ['ROLE_USER'];
        // TODO: Implement getRoles() method.
    }

    public function getPassword()
    {
      //  return $this->pass;
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->name;
        // TODO: Implement getUsername() method.
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

}