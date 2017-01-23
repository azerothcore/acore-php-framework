<?php

namespace ACore\Soap;

interface SoapProvider {

    public function executeCommand($command);

    public function getSoapCli();

    public function setSoapCli(SoapCli $soapCli);
}
