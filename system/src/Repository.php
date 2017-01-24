<?php

namespace ACore\System;

class Repository extends \Doctrine\ORM\EntityRepository {

    /**
     * Helper function for direct queries
     * @param type $query
     */
    public function query($query) {
        return $this->getEntityManager()->getConnection()->query($query);
    }

}
