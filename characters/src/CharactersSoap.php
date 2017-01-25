<?php

namespace ACore\Characters;

use \ACore\Soap\SoapModule;

class CharactersSoap extends SoapModule {

    public function changeName($charName, $newName = NULL) {
        return $this->executeCommand(".character rename $charName $newName");
    }

    public function changeFaction($charName) {
        return $this->executeCommand(".character changefaction $charName");
    }

    public function changeRace($charName) {
        return $this->executeCommand(".character changerace $charName");
    }

}
