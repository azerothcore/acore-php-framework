<?php

class ExampleModule extends \ACore\Realmlist\RListModule {
    
    /**
     * 
     * @param \ACore\Realmlist\RList $rList
     * @return ExampleModule
     */
    public static function getInstance(\ACore\Realmlist\RList $rList) {
        return parent::getInstance($rList);
    }

    public function getAccountsHigherThanFive() {
        $conn = $this->getAuthDB()->getConn();

        $result = $conn->query(""
                . "SELECT * "
                . "FROM account "
                . "WHERE id > 5");

        return $result->fetch_all();
    }

}
