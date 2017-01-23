<?php

class ExampleConf extends ACore\Service\Conf {

    // system wide dependencies
    public $modules = [
        "system" => [],
        "realmlist" => [
            ExampleModule::class
        ],
        "realm" => [],
    ];
    // realmlists
    public $rList = [
        // typical realmlist structure
        "localhost" => [
            // auth db connection
            "db_auth_host" => "localhost",
            "db_auth_port" => "3306",
            "db_auth_name" => "azerothcore_local_auth",
            "db_auth_user" => "root",
            "db_auth_pass" => "root",
            // specific realmlist dependencies
            "modules" => [
                "realmlist" => [],
                "realm" => []
            ],
            "realms" => [
                "azerothcore" => [
                    // world db connection
                    "db_world_host" => "localhost",
                    "db_world_port" => "3306",
                    "db_world_name" => "azerothcore_local_world",
                    "db_world_user" => "root",
                    "db_world_pass" => "root",
                    // char db connection
                    "db_char_host" => "localhost",
                    "db_char_port" => "3306",
                    "db_char_name" => "azerothcore_local_chars",
                    "db_char_user" => "root",
                    "db_char_pass" => "root",
                    // soap connection
                    "soap_host" => "",
                    "soap_port" => "",
                    "soap_user" => "",
                    "soap_pass" => "",
                    "soap_protocol" => "http",
                    // specific realm dependencies
                    "modules" => []
                ]
            ]
        ]
    ];

}
