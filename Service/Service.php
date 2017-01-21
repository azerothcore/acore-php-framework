<?php

namespace ACore\Service;

use ACore\Auth\AuthDB;
use ACore\Realmlist\RList;
use ACore\System\Provider;

/**
 * Registry Pattern & Dependency Container for RLists & Modules
 */
class Service extends Provider {

    protected $_rlists = array();
    protected $conf = array();
    protected $name;

    public static function createByConf($conf, $name = "") {
        return new self($conf, $name);
    }

    public function __construct(Conf $conf, $name = "") {
        $this->conf = $conf;
        $this->name = $name;

        $this->registerModules($this->conf->modules["system"]);

        $rList = $conf->rList;

        foreach ($rList as $realmlist => $rListInfo) {
            $rListInfo["modules"]["realmlist"] = array_merge($rListInfo["modules"]["realmlist"], $this->conf->modules["realmlist"]);
            $rListInfo["modules"]["realm"] = array_merge($rListInfo["modules"]["realm"], $this->conf->modules["realm"]);

            $this->registerRListByConf($realmlist, $rListInfo);
        }
    }

    /**
     * 
     * @param type $name
     * @param \ACore\Auth\AuthDB $authDB
     * @return ACore\Realm\RList
     */
    public function registerRList($realmlist, AuthDB $authDB, $modules = array()) {
        $this->_rlists[$realmlist] = new RList($realmlist, $authDB, $modules);
        return $this->_rlists[$realmlist];
    }

    public function registerRListByConf($realmlist, $conf) {
        $this->_rlists[$realmlist] = RList::createByConf($conf, $realmlist);
        return $this->_rlists[$realmlist];
    }

    public function registerRealmModule($rListName, $realmName, Module $module) {
        $this->getRealm($rListName, $realmName)->registerModule($module);
    }

    public function registerRListModule($rListName, Module $module) {
        $this->getRList($rListName)->registerModule($module);
    }

    public function getRealmModule($rListName, $realmName, $className) {
        $this->getRealm($rListName, $realmName)->getModule($className);
    }

    public function getRListModule($rListName, $className) {
        $this->getRList($rListName)->getModule($className);
    }

    public function getModule($className, $rListName = "", $realmName = "") {
        if ($rListName) {
            $rList = $this->getRList($rListName);
            if ($rList)
                return $rList->getModule($className);
        }

        return parent::getModule($className);
    }

    /**
     * 
     * @param type $name
     * @return RList
     */
    public function getRList($name) {
        return $this->_rlists[$name];
    }

    public function getRLists() {
        return $this->_rlists;
    }

    /**
     * 
     * @param type $rListName
     * @param type $realmName
     * @return \ACore\Realm\Realm
     */
    public function getRealm($rListName, $realmName) {
        return $this->getRList($rListName)->getRealm($realmName);
    }

}
