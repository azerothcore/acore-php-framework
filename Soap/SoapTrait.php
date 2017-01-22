<?php

namespace ACore\Soap;

trait SoapTrait {

    protected $soapCli;

    public function executeCommand($command) {
        return $this->getSoapCli()->executeCommand($command);
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
