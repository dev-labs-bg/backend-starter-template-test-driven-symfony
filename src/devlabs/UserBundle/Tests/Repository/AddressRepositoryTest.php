<?php

namespace devlabs\UserBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use devlabs\UserBundle\Tests\DatabasePrimer;

/**
 * Class AddressRepositoryTest
 * @package devlabs\UserBundle\Tests\Repository
 */
class AddressRepositoryTest extends KernelTestCase
{
   /**
     * @var \Doctrine\ORM\EntityManager
     */
	private $addressRepository;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
		parent::setUp();
        self::bootKernel();

		DatabasePrimer::prime(self::$kernel);
        $this->addressReposity = static::$kernel->getContainer()->get('doctrine')
								->getManager()->getRepository('UserBundle:Address');
    }

    public function testGetAllCities()
    {
		$cities = $this->addressReposity->getCities();
        $this->assertCount(1, $cities);
    }

    public function testGetAddressByTerm()
    {
		$hints = $this->addressReposity->getAddressesByTerm('foo');
        $this->assertCount(1, $hints);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
    }
}
