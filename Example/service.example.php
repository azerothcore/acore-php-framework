<?php

require_once "../Framework/bootstrap.php";

use ACore\Framework\ServiceImpl;

require_once "module.example.php";
require_once "conf.example.php";

$service = new ServiceImpl(new ExampleConf());
$server = $service->getRList("localhost");
$realm = $server->getRealm("azerothcore");

// example of AccountMgr Module
$accountMgr = \ACore\Account\AccountMgr::getInstance($server);
$accountInfo = $accountMgr->getAccountByName("test1");

print_r($accountInfo);

// ModuleExample 
$exampleModule = ExampleModule::getInstance($server);
$result = $exampleModule->getAccountsHigherThanFive();

print_r($result);

// Creature Example
$creatureTemplate = ACore\Creature\CreatureTemplate::getInstance($realm);
$result = $creatureTemplate->getCreatureByEntry(11502); // ragnaros

print_r($result);
