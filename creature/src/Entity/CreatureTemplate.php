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
    private $entry;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * Get id
     *
     * @return int
     */
    public function getEntry() {
        return $this->entry;
    }

    public function setEntry($entry) {
        $this->id = $entry;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
