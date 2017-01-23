<?php

namespace ACore\Characters\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACore\Creature\Entity\CreatureTemplate
 * 
 * @ORM\Entity(repositoryClass="ACore\Characters\Repository\CharactersMgr")
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
     * @var string
     *
     * @ORM\Column(name="account", type="string")
     */
    public $account;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    public $name;

    public function __construct($guid) {
        $this->guid = $guid;
    }

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
