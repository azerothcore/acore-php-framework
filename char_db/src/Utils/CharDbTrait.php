<?php

namespace ACore\CharDb\Utils;

use ACore\Database\Services\DoctrineDbMgr;

trait CharDbTrait {

    /**
     *
     * @var DoctrineDbMgr 
     */
    protected $charDb;

    /**
     * 
     * @return DoctrineDbMgr
     */
    public function getCharDb() {
        return $this->charDb;
    }

    public function setWorldDb(DoctrineDbMgr $charDb) {
        $this->charDb = $charDb;
        $this->charDb->configureEntities(array(realpath(__DIR__ . "/../Entity/")));
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getCharEm($alias) {
        return $this->charDb->getEm($alias, "char");
    }

}
