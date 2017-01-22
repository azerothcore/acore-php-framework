<?php

namespace ACore\Creature;

use ACore\System\Entity;

class CreatureTemplate extends Entity {
    public $entry;
    
    public function getEntry() {
        return $this->entry;
    }
}

