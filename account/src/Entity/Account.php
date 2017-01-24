<?php

namespace ACore\Account\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACore\Account\Entity\Account
 * 
 * @ORM\Entity(repositoryClass="ACore\Account\Repository\AccountMgr")
 * @ORM\Table(name="account")
 */
class Account {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string")
     */
    public $username;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    public $locked;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    public $email;

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function isLocked() {
        return $this->locked == 0 ? false : true;
    }

    public function getEmail() {
        return $this->email;
    }

    /* public function setId($id) {
      $this->id = $id;
      return $this;
      } */

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setLocked($locked) {
        $this->locked = $locked;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

}
