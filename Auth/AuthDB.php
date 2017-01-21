<?php

namespace ACore\Auth;

use \ACore\Database\DBConnection;

class AuthDB extends DBConnection {

    public function getAccountWithPass($username, $password) {
        $_username = $this->_mysqli->escape_string($username);
        $_password = $this->_mysqli->escape_string($password);

        $enc_password = sha1(strtoupper($_username) . ':' . strtoupper($_password));

        $result = $this->_mysqli->query(""
                . "SELECT * "
                . "FROM account "
                . "WHERE LOWER(username) = LOWER('" . $_username . "') AND sha_pass_hash = '" . $enc_password . "'");

        return $result;
    }

    public function getAccountInfoByName($username) {
        $_username = $this->_mysqli->escape_string($username);

        $result = $this->_mysqli->query(""
                . "SELECT * "
                . "FROM account "
                . "WHERE LOWER(username) = LOWER('" . $_username . "');");

        return $result;
    }

}
