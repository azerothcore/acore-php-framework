<?php

namespace ACore\System;

class EntityMgr extends \Doctrine\ORM\EntityRepository {
    
    /**
     * Helper function for direct queries
     * @param type $query
     */
    public function query($query) {
        return $this->createQueryBuilder($query)->getQuery()->getResult();
    }
}

