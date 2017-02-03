<?php

namespace ACore\System\Utils;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiController extends Controller {

    abstract public function getServiceName();

    public function getRepo(Request $req) {
        $alias = $req->get("_prefix");
        $service = $this->getServiceName();
        return $this->get($service)->getCreatureTmplRepo($alias);
    }

    public function serialize($res) {
        return new Response($this->get('serializer')->serialize($res, 'json'));
    }

}
