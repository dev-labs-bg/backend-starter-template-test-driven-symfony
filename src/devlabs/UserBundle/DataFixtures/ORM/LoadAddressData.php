<?php

namespace devlabs\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use devlabs\UserBundle\Entity\Address;

class LoadAddressData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cities = [
            'Varna',
            'Sofia',
            'Vienna',
            'New York',
            'Newcastle',
            'San Francisco'
        ];

        foreach ($cities as $city) {
            $address = new Address();
            $address->setCity($city);

            $manager->persist($address);
            $manager->flush();
        }
    }
}
