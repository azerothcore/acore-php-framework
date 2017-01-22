<?php

namespace ACore\Soap;

ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
ini_set('soap.wsdl_cache', 0);

class SoapCli {

    private $protocol;
    private $host;
    private $port;
    private $user;
    private $passwd;

    public function __construct($host, $port, $user, $passwd, $protocol = "http") {
        $this->protocol = $protocol;
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->passwd = $passwd;
    }

    public function executeCommand($command) {

        $soap = new \SoapClient(NULL, Array(
            'location' => $this->protocol . '://' . $this->host . ':' . $this->port . '/',
            'uri' => 'urn:TC',
            'style' => SOAP_RPC,
            'login' => $this->user,
            'password' => $this->passwd,
            'trace' => 1,
            'keep_alive' => false //keep_alive only works in php 5.4, but meh...
        ));

        try {
            $result = $soap->executeCommand(new \SoapParam($command, 'command'));
            return $result;
        } catch (\Exception $e) {
            return $e;
        }
    }

}
