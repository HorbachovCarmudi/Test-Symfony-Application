<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\ValueObject\Address;

/**
 * Class AddressTes
 * @package ApplicationBundle\Tests\Entity
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test constructor and getter
     */
    public function testConstructor()
     {
         $correctAddressTitle = 'some address here';
         $address = new Address($correctAddressTitle);
         $this->assertEquals($correctAddressTitle, $address->getAddress());
     }
}