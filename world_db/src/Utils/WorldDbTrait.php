<?php

namespace ACore\WorldDb\Utils;

use ACore\Database\Services\DoctrineDbMgr;

trait WorldDBTrait {

    /**
     *
     * @var DoctrineDbMgr 
     */
    protected $worldDb;
    protected $worldEm;

    /**
     * 
     * @return DoctrineDbMgr
     */
    public function getWorldDB() {
        return $this->worldDB;
    }
    
    public function setWorldDb(DoctrineDbMgr $worldDb) {
        $this->worldDb = $worldDb;
        $this->worldDb->configureEntities(array(realpath(__DIR__ . "/../Entity/")));
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getWorldEm($alias) {
        return $this->worldDb->getEm($alias, "world");
    }

}
