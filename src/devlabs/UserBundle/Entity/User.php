<?php

namespace devlabs\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="devlabs\UserBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Many Users have One Address.
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="users")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $address;

    /**
     * @ORM\Column(name="username", type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(name="gender", type="string", length=100)
     */
    private $gender;

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            $this->id,
            $this->username,
            $this->password,
            $this->gender,
            $this->address->getCity()
        ];
    }

    /**
     * @param $username
     * @param $password
     * @param $gender
     */
    public function setOptions($username, $password, $gender)
    {
        $this->username = $username;
        $this->password = $password;
        $this->gender = $gender;
    }
}