<?php

namespace ACore\Service;

abstract class Conf {

    // system wide dependencies
    public $modules = [
        "system" => [],
        "realmlist" => [],
        "realm" => [],
    ];
    // realmlists
    public $rList = [];

    public function merge(Conf $conf) {
        $this->modules = array_merge_recursive ($this->modules, $conf->modules);
        $this->rList = array_merge_recursive ($this->rList, $conf->rList);
        
        return $this;
    }

}
