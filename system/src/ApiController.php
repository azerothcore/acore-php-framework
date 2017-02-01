<?php

namespace ACore\System;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ApiController extends Controller {

    public static function JsonResponse($data) {
        $response = new JsonResponse();
        $response->setContent(json_encode($data));
        return $response;
    }

}
