<?php

namespace ACore\Creature\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACore\Creature\Entity\CreatureTemplate
 * 
 * @ORM\Entity(repositoryClass="ACore\Creature\Repository\CreatureMgr")
 * @ORM\Table(name="creature")
 */
class Creature {

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
     * @ORM\Column(name="id", type="integer")
     *
     */
    public $id;

    public function __construct($guid) {
        $this->guid = $guid;
    }

    public function getGuid() {
        return $this->guid;
    }

    public function getId() {
        return $this->id;
    }

}
