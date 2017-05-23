<?php

namespace devlabs\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AddressRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AddressRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getCities()
    {
        return array_map(function ($address) {
            return $address->getCity();
        }, $this->findAll());
    }

    public function getAddressesByTerm(string $term, int $limit = 5)
    {
		return $this->createQueryBuilder('a')->where('a.city LIKE :term')
				->setParameter('term', $term)->setMaxResults($limit)
				->getQuery()->getResult();
    }
}
