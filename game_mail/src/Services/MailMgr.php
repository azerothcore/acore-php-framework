<?php

namespace ACore\GameMail\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use \ACore\Soap\Utils\SoapTrait;

class ServerMgr {

    use ContainerAwareTrait;
    use SoapTrait;

    public function sendItem($playerName, $subject, $message, $itemId, $stack) {
        $_message = addslashes($message);
        $_subject = addslashes($subject);
        $_itemId = intval($itemId);
        $_stack = intval($stack);
        return $this->executeCommand('.send items  ' . $playerName . ' "' . $_subject . '" "' . $_message . '" ' . $_itemId . ':' . $_stack);
    }

}
