<?php

namespace ACore\Creature\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ACore\System\ApiController;
use ACore\Creature\Entity\CreatureTemplate;

/**
 *
 * @Route("/creature_template")
 *
 * 
 */
class CreatureTmplCtrl extends ApiController
{   
    /**
     * Matches /creature_template exactly
     *
     * @Route("/", name="creature_template")
     */
    public function listCreatureTmpl()
    {
        $data=$this->getRepository()->findAll();
        return self::JsonResponse($data);
    }

    /**
     *
     * @Route("/{entry}", name="creature_template_single")
     */
    public function getCreatureTmpl($entry)
    {
        
    }
    
    /**
     * 
     * @return CreatureTemplate
     */
    protected function getRepository() {
        return $this->getDoctrine()->getRepository(CreatureTemplate::class);
    }
}