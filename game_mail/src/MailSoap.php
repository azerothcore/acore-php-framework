<?php

namespace ACore\GameMail;

use \ACore\Soap\SoapModule;

class MailSoap extends SoapModule {

    public function sendItem($playerName, $subject, $message, $itemId, $stack) {
        $_message = addslashes($message);
        $_subject = addslashes($subject);
        $_itemId = intval($itemId);
        $_stack = intval($stack);
        return $this->executeCommand('.send items  ' . $playerName . ' "' . $_subject . '" "' . $_message . '" ' . $_itemId . ':' . $_stack);
    }

}
