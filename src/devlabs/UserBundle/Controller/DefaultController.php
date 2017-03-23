<?php

namespace devlabs\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DefaultController
 * @package devlabs\UserBundle\Controller
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $userService = $this->get('user.service');
        $addressService = $this->get('address.service');

        $response = new JsonResponse();
        $response->setData([
            'users' => $userService->getAllUsers(),
            'addresses' => $addressService->getAllCities()
        ]);

        return $response;
    }
}