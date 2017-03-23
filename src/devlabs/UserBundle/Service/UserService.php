<?php

namespace devlabs\UserBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Class UserService
 * @package devlabs\UserBundle\Service
 */
class UserService
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->userRepository = $em->getRepository('UserBundle:User');
    }

    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->userRepository->getUsers();
    }
}