<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 13.11.2016
 * Time: 16:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="msgs")
 */
class msgs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $msg_id;
    /**
     * @ORM\Column(type="string")
     */
    private $usr_login;
    /**
     * @ORM\Column(type="string")
     */
    private $msg;

    /**
     * @return mixed
     */
    public function getMsgId()
    {
        return $this->msg_id;
    }

    /**
     * @param mixed $msg_id
     */
    public function setMsgId($msg_id)
    {
        $this->msg_id = $msg_id;
    }

    /**
     * @return mixed
     */
    public function getUsrLogin()
    {
        return $this->usr_login;
    }

    /**
     * @param mixed $usr_login
     */
    public function setUsrId($usr_login)
    {
        $this->usr_id = $usr_login;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

}