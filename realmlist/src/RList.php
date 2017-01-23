<?php

namespace ACore\Realmlist;

use ACore\Realm\Realm;
use ACore\Auth\AuthDB;
use ACore\Characters\CharDB;
use ACore\World\WorldDB;
use ACore\System\Provider;
use ACore\System\Module;
use ACore\Auth\AuthDBProvider;
use ACore\Utils\AUtils as A;

/**
 * Registry pattern for Realms
 */
class RList extends Provider {

    protected $_realms = array();
    protected $authDB;
    protected $realmlist;
    protected $conf;

    public function __construct($realmlist, AuthDB $authDB, $modules = array(), $conf = array()) {
        $this->authDB = $authDB;
        $this->realmlist = $realmlist;
        $this->conf = $conf;

        $this->registerModules($modules["realmlist"]);

        foreach ($this->conf["realms"] as $realm => $realmInfo) {
            if (isset($modules["realm"]) && isset($realmInfo["modules"]))
                $realmInfo["modules"] = array_merge($realmInfo["modules"], $modules["realm"]);

            $this->registerRealmByConf($realm, $realmInfo);
        }
    }

    public static function createByConf($conf, $realmlist) {
        $authDb = new AuthDB(
                A::V($conf, "db_auth_host"), A::V($conf, "db_auth_name"), A::V($conf, "db_auth_user"), A::V($conf, "db_auth_pass"), A::V($conf, "db_auth_port"), A::V($conf, "db_auth_socket")
        );

        $_this = new static($realmlist, $authDb, A::V($conf, "modules"), $conf);

        return $_this;
    }

    /**
     * 
     * @param type $name
     * @param type $charDB
     * @param type $worldDB
     * @return ACore\Realm\Realm
     */
    public function registerRealm($name, CharDB $charDB, WorldDB $worldDB, $modules) {
        $this->_realms[$name] = new Realm($name, $charDB, $worldDB, $this->authDB, $modules);
        return $this->_realms[$name];
    }

    public function registerRealmByConf($name, $conf) {
        $this->_realms[$name] = Realm::createByConf($conf, $name);
        return $this->_realms[$name];
    }

    public function registerModule(Module $module) {
        if ($module instanceof RListModule) {
            $module->setRList($this);
        }

        if ($module instanceof AuthDBProvider) {
            $module->setAuthDB($this->getAuthDB());
        }

        parent::registerModule($module);
    }

    public function getModule($className, $realmName = "") {
        if ($realmName) {
            $realm = $rList->getRealm($realmName);
            if ($realm)
                return $realm->getModule($className);
        }

        return parent::getModule($className);
    }

    /**
     * 
     * @param type $name
     * @return \ACore\Realm\Realm
     */
    public function getRealm($name) {
        return $this->_realms[$name];
    }

    public function getRealms() {
        return $this->_realms;
    }

    /**
     * 
     * @return ACore\Auth\AuthDB
     */
    public function getAuthDB() {
        return $this->authDB;
    }

    public function setAuthDB($authDB) {
        $this->authDB = $authDB;
        return $this;
    }

    public function getName() {
        return $this->realmlist;
    }

    public function setName($name) {
        $this->realmlist = $name;
        return $this;
    }

    public function getRealmlist() {
        return $this->realmlist;
    }

    public function getConf() {
        return $this->conf;
    }

    public function setRealmlist($realmlist) {
        $this->realmlist = $realmlist;
        return $this;
    }

}
