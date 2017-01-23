<?php

namespace ACore\Creature\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACore\Creature\CreatureTemplate
 * 
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="ACore\Creature\Repository\CreatureTmplMgr")
 */
class CreatureTemplate
{
    /**
     * @var int
     *
     * @ORM\Column(name="entry", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
}
