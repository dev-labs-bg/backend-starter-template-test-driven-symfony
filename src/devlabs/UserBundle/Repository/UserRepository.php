<?php

namespace devlabs\UserBundle\Repository;

use devlabs\UserBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function getUsers()
    {
        return array_map(function ($user) {
            return $user->getOptions();
        }, $this->findAll());
    }
}