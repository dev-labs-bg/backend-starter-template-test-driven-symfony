<?php

namespace devlabs\UserBundle\Tests\Service;

use Doctrine\ORM\EntityManager;
use devlabs\UserBundle\Service\UserService;
use devlabs\UserBundle\Repository\UserRepository;

/**
 * Class UserServiceTest
 * @package devlabs\UserBundle\Tests\Service
 */
class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAllUsersReturnsUsers()
    {
        $users = [
            [1, 'user1', 'pass1', 'gender1', 'city1'],
            [2, 'user2', 'pass2', 'gender2', 'city2']
        ];

        // `$userRepositoryMock->getCities()` will return our mock users
        $userRepositoryMock = $this->getUserRepositoryMock();
        $userRepositoryMock->expects($this->once())
            ->method('getUsers')
            ->will($this->returnValue($users));

        // `entityManager->getRepository('UserBundle:Address')` will return our mock repository
        $entityManagerMock = $this->getEntityManagerMock(['getRepository']);
        $entityManagerMock->expects($this->once())
            ->method('getRepository')
            ->with('UserBundle:User')
            ->will($this->returnValue($userRepositoryMock));

        // instantiate service, call the tested method, assert the response
        $userService = new UserService($entityManagerMock);
        $response = $userService->getAllUsers();

        $this->assertEquals($users, $response);
    }

    public function getEntityManagerMock(array $mockedMethods)
    {
        return $entityManager = $this
            ->getMockBuilder(EntityManager::class)
            ->setMethods($mockedMethods)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getUserRepositoryMock()
    {
        return $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}