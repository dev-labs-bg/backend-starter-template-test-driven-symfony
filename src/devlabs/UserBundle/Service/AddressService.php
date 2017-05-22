<?php

namespace devlabs\UserBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Class AddressService
 * @package devlabs\UserBundle\Service
 */
class AddressService
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    private $addressReposity;

    /**
     * AddressService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->addressReposity = $em->getRepository('UserBundle:Address');
    }

    /**
     * @return mixed
     */
    public function getAllCities()
    {
        return $this->addressReposity->getCities();
    }
}
