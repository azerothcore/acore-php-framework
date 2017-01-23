<?php

namespace ACore\Framework;

use ACore\Service\Conf;

class ConfDef extends Conf {

    // system wide dependencies
    // all default modules will be included here
    public $modules = [
        "system" => [],
        "realmlist" => [
            \ACore\Account\AccountMgr::class
        ],
        "realm" => [
            \ACore\Account\AccountSoap::class,
            \ACore\GameMail\MailSoap::class,
            \ACore\Creature\CreatureModule::class,
            \ACore\Characters\CharactersMgr::class
        ],
    ];

}
