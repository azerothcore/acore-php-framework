<?php

namespace ACore\Soap;

interface SoapProvider {

    public function getSoapCli();

    public function setSoapCli(SoapCli $soapCli);
}
