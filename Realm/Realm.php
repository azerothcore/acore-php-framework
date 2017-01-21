<?php

namespace ACore\Realm;

use ACore\Characters\CharDB;
use ACore\World\WorldDB;
use ACore\Auth\AuthDB;
use ACore\Soap\SoapCli;
use ACore\System\Provider;
use ACore\System\Module;
use ACore\World\WorldDBProvider;
use ACore\Auth\AuthDBProvider;
use ACore\Characters\CharDBProvider;
use ACore\Soap\SoapProvider;
use ACore\Utils\AUtils as A;

/**
 * 
 */
class Realm extends Provider implements SoapProvider, WorldDBProvider, CharDBProvider, AuthDBProvider {

    protected $authDB;
    protected $charDB;
    protected $worldDB;
    protected $name;
    protected $soapCli;

    function __construct($name, CharDB $charDB, $modules = array(), WorldDB $worldDB = NULL, AuthDB $authDB = NULL, SoapCli $soapCli = NULL) {
        $this->charDB = $charDB;
        $this->worldDB = $worldDB;
        $this->authDB = $authDB;
        $this->name = $name;
        $this->soapCli = $soapCli;

        $this->registerModules($modules);
    }

    public static function createByConf($conf, $realmName) {
        $charDB = new CharDB(
                A::V($conf, "db_char_host"), A::V($conf, "db_char_name"), A::V($conf, "db_char_user"), A::V($conf, "db_char_pass"), A::V($conf, "db_char_port"), A::V($conf, "db_char_socket")
        );

        $_this = new self($realmName, $charDB, A::V($conf, "modules"));

        if (A::V($conf, "db_auth_host")) {
            $authDb = new AuthDB(
                    A::V($conf, "db_auth_host"), A::V($conf, "db_auth_name"), A::V($conf, "db_auth_user"), A::V($conf, "db_auth_pass"), A::V($conf, "db_auth_port"), A::V($conf, "db_auth_socket")
            );

            $_this->setAuthDB($authDB);
        }

        if (A::V($conf, "db_world_host")) {
            $worldDb = new WorldDB(
                    A::V($conf, "db_world_host"), A::V($conf, "db_world_name"), A::V($conf, "db_world_user"), A::V($conf, "db_world_pass"), A::V($conf, "db_world_port"), A::V($conf, "db_world_socket")
            );

            $_this->setWorldDB($worldDb);
        }

        if (A::V($conf, "soap_host")) {
            $soapCli = new SoapCli(
                    A::V($conf, "soap_host"), A::V($conf, "soap_port"), A::V($conf, "soap_user"), A::V($conf, "soap_pass"), A::V($conf, "soap_protocol")
            );

            $_this->setSoapCli($soapCli);
        }

        return $_this;
    }

    public function registerModule(Module $module) {
        if ($module instanceof RealmModule) {
            $module->setRealm($this);
        } else {
            if ($module instanceof AuthDBProvider) {
                $module->setAuthDB($this->getAuthDB());
            }

            if ($module instanceof CharDBProvider) {
                $module->setCharDB($this->getCharDB());
            }

            if ($module instanceof WorldDBProvider) {
                $module->setWorldDB($this->getWorldDB());
            }

            if ($module instanceof SoapProvider && $this->getSoapCli()) {
                $module->setSoapCli($this->getSoapCli());
            }
        }

        parent::registerModule($module);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @return ACore\Auth\AuthDB
     */
    public function getAuthDB() {
        return $this->authDB;
    }

    public function setAuthDB(AuthDB $authDB) {
        $this->authDB = $authDB;
        return $this;
    }

    public function getCharDB() {
        return $this->charDB;
    }

    public function getWorldDB() {
        return $this->worldDB;
    }

    public function setCharDB(CharDB $charDB) {
        $this->charDB = $charDB;
        return $this;
    }

    public function setWorldDB(WorldDB $worldDB) {
        $this->worldDB = $worldDB;
        return $this;
    }

    public function setSoapCli(SoapCli $soapCli) {
        $this->soapCli = $soapCli;
    }

    public function getSoapCli() {
        return $this->soapCli;
    }

}
