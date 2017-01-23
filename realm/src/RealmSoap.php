<?php

namespace ACore\Realm;

use \ACore\Soap\SoapModule;

class RealmSoap extends SoapModule {

    public function serverInfo() {
        return $this->executeCommand('.server info');
    }

    /**
     * 
     * @param \ACore\System\Provider $provider
     * @return RealmSoap
     */
    public static function getInstance(\ACore\System\Provider $provider) {
        return parent::getInstance($provider);
    }

}
