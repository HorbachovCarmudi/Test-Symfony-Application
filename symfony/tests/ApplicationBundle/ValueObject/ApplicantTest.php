<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\ValueObject\Applicant;

/**
 * Class BlogTest
 * @package ApplicationBundle\Tests\Entity
 */
class ApplicantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test constructor and getters
     */
    public function testConstructor()
     {
         $correctEmail = 'email@email.com';
         $correctName = 'name';

         $applicant = new Applicant($correctEmail, $correctName);

         $this->assertEquals($correctEmail, $applicant->getEmail());
         $this->assertEquals($correctName, $applicant->getName());
     }
}