<?php

namespace ACore\Realmlist;

use ACore\Realm\Realm;
use ACore\AuthDb\AuthDb;
use ACore\CharDb\CharDb;
use ACore\WorldDb\WorldDb;
use ACore\System\Provider;
use ACore\System\Module;
use ACore\AuthDb\AuthDbProvider;
use ACore\Utils\AUtils as A;

/**
 * Registry pattern for Realms
 */
class RList extends Provider {

    protected $_realms = array();
    protected $authDB;
    protected $realmlist;
    protected $conf;

    public function __construct($realmlist, AuthDb $authDB, $modules = array(), $conf = array(), $environment = "prod", $debug = false) {
        $this->authDB = $authDB;

        parent::__construct($realmlist, $modules["realmlist"], $conf, $environment, $debug);

        foreach ($this->conf["realms"] as $realm => $realmInfo) {
            if (isset($modules["realm"]) && isset($realmInfo["modules"]))
                $realmInfo["modules"] = array_merge($realmInfo["modules"], $modules["realm"]);

            $this->registerRealmByConf($realm, $realmInfo);
        }
    }

    public static function createByConf($conf, $realmlist) {
        $authDb = new AuthDb(
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
    public function registerRealm($name, CharDb $charDB, WorldDb $worldDB, $modules) {
        $this->_realms[$name] = new Realm($name, $charDB, $modules, null, $worldDB, $this->authDB);
        return $this->_realms[$name];
    }

    public function registerRealmByConf($name, $conf) {
        $this->_realms[$name] = Realm::createByConf($conf, $name);

        $this->getRouteCollection()->addCollection($this->getRealm($name)->getRouteCollection());

        return $this->_realms[$name];
    }

    public function registerModule(Module $module) {
        if ($module instanceof RListModule) {
            $module->setRList($this);
        }

        if ($module instanceof AuthDbProvider) {
            $module->setAuthDb($this->getAuthDb());
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
     * Get modules from realmlist and its realms
     */
    public function getAllModules() {
        $modules = $this->moduleList;
        foreach ($this->_realms as $realm)
            $modules = array_merge($modules, $realm->getAllModules());

        return $modules;
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
     * @return ACore\AuthDb\AuthDb
     */
    public function getAuthDb() {
        return $this->authDB;
    }

    public function setAuthDb($authDB) {
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

    /**
     *
     * @Route("/{realm}/{module}/{route}")
     */
    public function getRealmRoute($realm, $module, $route) {
        return $this->getRealm($realm)->getRoute($module, $route);
    }

}
