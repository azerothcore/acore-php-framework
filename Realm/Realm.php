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

    use \ACore\Soap\SoapTrait;
    use \ACore\Auth\AuthDBTrait;
    use \ACore\World\WorldDBTrait;
    use \ACore\Characters\CharDBTrait;

    protected $name;

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

        $authDB = NULL;
        $worldDB = NULL;
        $soapCli = NULL;

        if (A::V($conf, "db_auth_host")) {
            $authDB = new AuthDB(
                    A::V($conf, "db_auth_host"), A::V($conf, "db_auth_name"), A::V($conf, "db_auth_user"), A::V($conf, "db_auth_pass"), A::V($conf, "db_auth_port"), A::V($conf, "db_auth_socket")
            );
        }

        if (A::V($conf, "db_world_host")) {
            $worldDB = new WorldDB(
                    A::V($conf, "db_world_host"), A::V($conf, "db_world_name"), A::V($conf, "db_world_user"), A::V($conf, "db_world_pass"), A::V($conf, "db_world_port"), A::V($conf, "db_world_socket")
            );
        }

        if (A::V($conf, "soap_host")) {
            $soapCli = new SoapCli(
                    A::V($conf, "soap_host"), A::V($conf, "soap_port"), A::V($conf, "soap_user"), A::V($conf, "soap_pass"), A::V($conf, "soap_protocol")
            );
        }

        $_this = new self($realmName, $charDB, A::V($conf, "modules"), $worldDB, $authDB, $soapCli);

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
                var_dump($this);
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

}
