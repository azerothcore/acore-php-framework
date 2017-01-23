<?php

namespace ACore\Database;

/**
 * DEPRECATED
 */
abstract class DBConnection {

    /**
     *
     * @var \mysqli
     */
    protected $_mysqli;

    public function __construct($host, $name, $user = "", $pass = "", $port = 3306, $socket = "") {
        $this->_mysqli = new \mysqli($host, $user, $pass, $name, intval($port), $socket);
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function disconnect() {
        if ($this->_mysqli === null) {
            return false;
        }
        $this->_mysqli->close();
        $this->_mysqli = null;
        return true;
    }

    /**
     * 
     * @return \mysqli
     */
    public function getConn() {
        return $this->_mysqli;
    }

    public function getVar($query) {
        $res = $this->query($query);
        if ($res) {
            $val = $res->fetch_array();
            return $val[0];
        }

        return $res;
    }

    public function query($query) {
        return $this->getConn()->query($query);
    }

    public function escapeString($string) {
        return $this->getConn()->escape_string($string);
    }

    /* [TODO]
      public function queryStmt() {

      }
     */

    public function getSingleObj($class, $query) {
        $res = $this->query($query);
        if ($res)
            return $res->fetch_object($class);

        return $res;
    }

    public function getSingleArrayAssoc($query) {
        $res = $this->query($query);
        if ($res)
            return $res->fetch_assoc();

        return $res;
    }

    public function getSingleArray($query) {
        $res = $this->query($query);
        if ($res)
            return $res->fetch_array();

        return $res;
    }

    public function getAllObjects($class, $query) {
        $result = $this->query($query);

        $resArray = array();
        while ($obj = $result->fetch_object($class)) {
            $resArray[] = $obj;
        }

        return $resArray;
    }

    public function getAllArrayAssoc($query) {
        $res = $this->query($query);
        if ($res)
            return $res->fetch_all(MYSQLI_ASSOC);

        return $res;
    }

    public function getAllArray($query) {
        $res = $this->query($query);
        if ($res)
            return $res->fetch_all(MYSQLI_NUM);

        return $res;
    }

}
