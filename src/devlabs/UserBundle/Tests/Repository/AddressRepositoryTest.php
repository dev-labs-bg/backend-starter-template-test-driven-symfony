<?php

namespace devlabs\UserBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use devlabs\UserBundle\Tests\DatabasePrimer;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

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

        // load fixtures
        $application = new Application(self::$kernel);
		$command = $application->find('doctrine:fixtures:load');
        /* $application->setAutoExit(false); */
        $command->run(
            new ArrayInput([
                'command' => 'doctrine:fixtures:load',
                '--append'  => true
            ]),
            new NullOutput()
        );
    }

    public function testGetAllCities()
    {
		$cities = $this->addressReposity->getCities();
        $this->assertCount(6, $cities);
    }

    public function testGetAddressByTerm()
    {
		$hints = $this->addressReposity->getAddressesByTerm('V');
        $this->assertCount(2, $hints);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
    }
}
