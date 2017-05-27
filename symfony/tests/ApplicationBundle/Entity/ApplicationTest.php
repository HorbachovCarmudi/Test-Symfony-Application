<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\Application;
use ApplicationBundle\Entity\ValueObject\Applicant;
use ApplicationBundle\Entity\ValueObject\File;
use ApplicationBundle\Entity\ValueObject\Address;
use ReflectionClass;

/**
 * Class BlogTest
 * @package ApplicationBundle\Tests\Entity
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test constructor and getters
     */
    public function testConstructor()
    {
        $applicant = new Applicant('email', 'name');
        $file = new File('filename');
        $address = new Address('test address');

        $application = new Application($applicant, $file, $address);

        $this->assertEquals($applicant, $application->getApplicant());
        $this->assertEquals($file, $application->getFile());
        $this->assertEquals($address, $application->getAddress());
    }

    public function testGetId()
    {
        $testId = 55;

        $applicant = new Applicant('email', 'name');
        $file = new File('filename');
        $address = new Address('test address');

        $application = new Application($applicant, $file, $address);
        $class = new ReflectionClass('ApplicationBundle\Entity\Application');

        $property = $class->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($application, $testId);

        $this->assertEquals($testId, $application->getId());
    }

    public function testGetCreatedAt()
    {
        $created_at = new \DateTime();

        $applicant = new Applicant('email', 'name');
        $file = new File('filename');
        $address = new Address('test address');

        $application = new Application($applicant, $file, $address);
        $class = new ReflectionClass('ApplicationBundle\Entity\Application');

        $property = $class->getProperty('created_at');
        $property->setAccessible(true);
        $property->setValue($application, $created_at);

        $this->assertEquals(
            date_format($created_at, 'm-d H:i:s'),
            $application->getCreatedAt()
        );
    }
}