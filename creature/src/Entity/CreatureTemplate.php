<?php

namespace ACore\Creature\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACore\Creature\Entity\CreatureTemplate
 * 
 * @ORM\Entity(repositoryClass="ACore\Creature\Repository\CreatureTmplRepository")
 * @ORM\Table(name="creature_template")
 */
class CreatureTemplate {

    /**
     * @var int
     *
     * @ORM\Column(name="entry", type="integer")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    public function setId($entry) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
