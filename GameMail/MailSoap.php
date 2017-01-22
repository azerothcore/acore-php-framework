<?php

namespace ACore\GameMail;

use \ACore\Soap\SoapModule;

class MailSoap extends SoapModule {

    public function sendItem($player, $object, $message, $itemId, $stack) {
        return $this->executeCommand('.send items  ' . $player . ' ".' . $object . '" "' . $message . '" .' . $itemId . ':' . $stack);
    }

}
