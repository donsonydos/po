<?php

namespace Zahira\ZahiraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //return $this->render('zahiraBundle:Default:index.html.twig');
        return new Response('hola mundo');
    }
}
