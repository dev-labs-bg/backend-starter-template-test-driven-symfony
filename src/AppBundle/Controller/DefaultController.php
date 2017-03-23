<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     *
     * @return Response
     */
    public function indexAction()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode([
            'status' => 'get_home'
        ]));

        return $response;
    }

    /**
     * @Route("/")
     * @Method("POST")
     *
     * @param Request $request
     * @return Response
     */
    public function addUserAction(Request $request)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode([
            'status' => 'post_home'
        ]));

        return $response;
    }
}
