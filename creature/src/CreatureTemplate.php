<?php

namespace ACore\Creature;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="creature_template")
 */
class CreatureTemplate {

    public $entry;

    public function __construct($entry) {
        $this->entry = $entry;
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    public function getEntry() {
        return $this->entry;
    }

}
