<?php
namespace devlabs\UserBundle\Tests\Service;

use Doctrine\ORM\EntityManager;
use devlabs\UserBundle\Service\AddressService;
use devlabs\UserBundle\Repository\AddressRepository;

/**
 * Class AddressServiceTest
 * @package devlabs\UserBundle\Tests\Service
 */
class AddressServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAllCitiesReturnsCities()
    {
        $cities = ['city1', 'city2'];

        // `$addressRepositoryMock->getCities()` will return our mock cities
        $addressRepositoryMock = $this->getAddressRepositoryMock();
        $addressRepositoryMock->expects($this->once())
            ->method('getCities')
            ->will($this->returnValue($cities));

        // `entityManager->getRepository('UserBundle:Address')` will return our mock repository
        $entityManagerMock = $this->getEntityManagerMock(['getRepository']);
        $entityManagerMock->expects($this->once())
            ->method('getRepository')
            ->with('UserBundle:Address')
            ->will($this->returnValue($addressRepositoryMock));

        // instantiate service, call the tested method, assert the response
        $addressService = new AddressService($entityManagerMock);
        $response = $addressService->getAllCities();

        $this->assertEquals($cities, $response);
    }

    public function getEntityManagerMock(array $mockedMethods)
    {
        // NOTE <Yavor>: I've left these here intentionally, so you can see the
        // diferrences between the classless and standard mocking without
        // having to switch branches.

        /* return $entityManager = $this */
        /*     ->getMockBuilder(EntityManager::class) */
        /*     ->setMethods($mockedMethods) */
        /*     ->disableOriginalConstructor() */
        /*     ->getMock(); */

        return $entityManager = $this->getMockBuilder('Doctrine\ORM\EntityManager')
                                ->setMethods(['getRepository'])
                                ->disableOriginalConstructor()
                                ->getMock();
    }

    public function getAddressRepositoryMock()
    {
        // NOTE <Yavor>: I've left these here intentionally, so you can see the
        // diferrences between the classless and standard mocking without
        // having to switch branches.

        /* return $this->getMockBuilder(AddressRepository::class) */
        /*     ->disableOriginalConstructor() */
        /*     ->getMock(); */

        $addressRepository = $this->getMockBuilder('TestRepo')
                            ->setMethods(['getCities'])
                            ->disableOriginalConstructor()
                            ->getMock();
        return $addressRepository;
    }
}
