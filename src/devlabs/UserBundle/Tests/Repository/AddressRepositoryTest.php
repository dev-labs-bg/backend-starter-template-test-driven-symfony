<?php

/* namespace devlabs\UserBundle\Tests\Repository; */

/* use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase; */
/* use devlabs\UserBundle\DatabasePrimer; */

/* /** */
/*  * Class AddressRepositoryTest */
/*  * @package devlabs\UserBundle\Tests\Repository */
/*  *1/ */
/* class AddressRepositoryTest extends KernelTestCase */
/* { */
/*    /** */
/*      * @var \Doctrine\ORM\EntityManager */
/*      *1/ */
/* 	private $addressRepository; */

/*     /** */
/*      * {@inheritDoc} */
/*      *1/ */
/*     protected function setUp() */
/*     { */
/* 		parent::setUp(); */
/*         self::bootKernel(); */

/* 		\devlabs\UserBundle\Test\DatabasePrimer::prime(self::$kernel); */
/*         $this->addressReposity = static::$kernel->getContainer()->get('doctrine') */
/* 								->getManager()->getRepository('UserBundle:Address'); */
/*     } */

/*     public function testGetAllCities() */
/*     { */
/* 		$cities = $this->addressReposity->getCities(); */
/*         $this->assertCount(1, $cities); */
/*     } */

/*     public function testGetAddressByTerm() */
/*     { */
/* 		$hints = $this->addressReposity->getAddressesByTerm('foo'); */
/*         $this->assertCount(1, $hints); */
/*     } */

/*     /** */
/*      * {@inheritDoc} */
/*      *1/ */
/*     protected function tearDown() */
/*     { */
/*         parent::tearDown(); */
/*     } */
/* } */
