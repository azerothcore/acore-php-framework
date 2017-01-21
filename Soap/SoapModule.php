<?php

namespace ACore\Soap;

use ACore\System\Module;

abstract class SoapModule extends Module implements SoapProvider {

    protected $soapCli;

    public function __construct() {
        
    }

    function executeCommand($command) {
        $this->getSoapCli()->executeCommand($command);
    }

    /**
     * 
     * @return \ACore\Soap\SoapCli
     */
    public function getSoapCli() {
        return $this->soapCli;
    }

    public function setSoapCli(SoapCli $soapCli) {
        $this->soapCli = $soapCli;
        return $this;
    }

}
