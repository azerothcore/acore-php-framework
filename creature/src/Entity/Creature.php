<?php

namespace ACore\Creature\Entity;

use ACore\System\Entity;

class Creature extends Entity {
    public $guid;
    public $id;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public function getGuid() {
        return $this->guid;
    }
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    public function getId() {
        return $this->id;
    }
}

