<?php

namespace ACore\Character\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity(repositoryClass="ACore\Character\Repository\CharacterRepository")
 * @ORM\Table(name="characters")
 */
class Character {

    /**
     * @var int
     *
     * @ORM\Column(name="guid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $guid;

    /**
     * @var int
     *
     * @ORM\Column(name="account", type="integer")
     */
    public $account;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    public $name;

    public function getGuid() {
        return $this->guid;
    }

    public function getAccount() {
        return $this->account;
    }

    public function getName() {
        return $this->name;
    }

}
