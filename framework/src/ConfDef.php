<?php

namespace ACore\Framework;

use ACore\Service\Conf;

class ConfDef extends Conf {

    // system wide dependencies
    // all default modules will be included here
    public $modules = [
        "system" => [
            \Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle::class,
            \Symplify\ModularRouting\SymplifyModularRoutingBundle::class
        ],
        "realmlist" => [
            \ACore\Account\AccountModule::class
        ],
        "realm" => [
            \ACore\Account\AccountSoap::class,
            \ACore\GameMail\MailSoap::class,
            \ACore\Creature\CreatureModule::class,
            \ACore\Characters\CharactersModule::class,
            \ACore\Characters\CharactersSoap::class,
            \ACore\Realm\RealmSoap::class,
        ],
    ];

}
