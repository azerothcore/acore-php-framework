<?php

namespace ACore\Database;

abstract class DBConnection {
    /**
     *
     * @var \mysqli
     */
    protected $_mysqli;

    public function __construct($host, $name, $user = "", $pass = "", $port = 3306, $socket = "") {
        $this->_mysqli = new \mysqli($host, $user, $pass, $name, intval($port), $socket);
    }

    public function getConn() {
        return $this->_mysqli;
    }

}
