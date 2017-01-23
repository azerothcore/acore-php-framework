<?php

namespace ACore\Creature;

use ACore\System\Entity;

class Creature extends Entity {
    public $guid;
    public $id;
    
    public function getGuid() {
        return $this->guid;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getCreatureTemplate() {
        //return 
    }
}

