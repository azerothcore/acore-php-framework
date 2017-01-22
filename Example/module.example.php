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
        $db = $this->getAuthDB();

        return $db->getAllObjects(ACore\Account\Account::class,""
                . "SELECT * "
                . "FROM account "
                . "WHERE id > 5");
    }

}
