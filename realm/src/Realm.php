<?php

namespace ACore\Realm;

use ACore\CharDb\CharDb;
use ACore\WorldDb\WorldDb;
use ACore\AuthDb\AuthDb;
use ACore\Soap\SoapCli;
use ACore\System\Provider;
use ACore\System\Module;
use ACore\WorldDb\WorldDbProvider;
use ACore\AuthDb\AuthDbProvider;
use ACore\CharDb\CharDbProvider;
use ACore\Soap\SoapProvider;
use ACore\Utils\AUtils as A;

/**
 * 
 */
class Realm extends Provider implements SoapProvider, WorldDbProvider, CharDbProvider, AuthDbProvider {

    use \ACore\Soap\SoapTrait;
    use \ACore\AuthDb\AuthDbTrait;
    use \ACore\WorldDb\WorldDbTrait;
    use \ACore\CharDb\CharDbTrait;

    protected $name;

    function __construct($name, CharDb $charDB, $modules = array(), $conf = null, WorldDb $worldDB = NULL, AuthDb $authDB = NULL, SoapCli $soapCli = NULL, $environment = "prod", $debug = false) {
        $this->charDB = $charDB;
        $this->worldDB = $worldDB;
        $this->authDB = $authDB;
        $this->soapCli = $soapCli;

        parent::__construct($name, $modules, $conf, $environment, $debug);
    }

    public static function createByConf($conf, $realmName) {
        $charDB = new CharDb(
                A::V($conf, "db_char_host"), A::V($conf, "db_char_name"), A::V($conf, "db_char_user"), A::V($conf, "db_char_pass"), A::V($conf, "db_char_port"), A::V($conf, "db_char_socket")
        );

        $authDB = NULL;
        $worldDB = NULL;
        $soapCli = NULL;

        if (A::V($conf, "db_auth_host")) {
            $authDB = new AuthDb(
                    A::V($conf, "db_auth_host"), A::V($conf, "db_auth_name"), A::V($conf, "db_auth_user"), A::V($conf, "db_auth_pass"), A::V($conf, "db_auth_port"), A::V($conf, "db_auth_socket")
            );
        }

        if (A::V($conf, "db_world_host")) {
            $worldDB = new WorldDb(
                    A::V($conf, "db_world_host"), A::V($conf, "db_world_name"), A::V($conf, "db_world_user"), A::V($conf, "db_world_pass"), A::V($conf, "db_world_port"), A::V($conf, "db_world_socket")
            );
        }

        if (A::V($conf, "soap_host")) {
            $soapCli = new SoapCli(
                    A::V($conf, "soap_host"), A::V($conf, "soap_port"), A::V($conf, "soap_user"), A::V($conf, "soap_pass"), A::V($conf, "soap_protocol")
            );
        }

        $_this = new static($realmName, $charDB, A::V($conf, "modules"), $conf, $worldDB, $authDB, $soapCli);

        return $_this;
    }

    public function registerModule(Module $module) {
        if ($module instanceof RealmModule) {
            $module->setRealm($this);
        }

        if ($module instanceof AuthDbProvider) {
            $module->setAuthDb($this->getAuthDb());
        }

        if ($module instanceof CharDbProvider) {
            $module->setCharDb($this->getCharDb());
        }

        if ($module instanceof WorldDbProvider) {
            $module->setWorldDb($this->getWorldDb());
        }

        if ($module instanceof SoapProvider && $this->getSoapCli()) {
            $module->setSoapCli($this->getSoapCli());
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
