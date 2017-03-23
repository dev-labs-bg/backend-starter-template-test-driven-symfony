<?php

namespace devlabs\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="devlabs\UserBundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * Address constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * One Address has Many Users.
     * @ORM\OneToMany(targetEntity="User", mappedBy="address")
     */
    private $users;

    /**
     * @ORM\Column(name="city", type="string", length=100)
     */
    private $city;

    public function getCity()
    {
        return $this->city;
    }
}