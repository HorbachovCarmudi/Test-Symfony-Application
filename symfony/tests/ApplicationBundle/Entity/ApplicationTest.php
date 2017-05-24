<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\Application;
use ApplicationBundle\Entity\ValueObject\Applicant;
use ApplicationBundle\Entity\ValueObject\File;

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

         $application = new Application($applicant, $file);

         $this->assertEquals($applicant, $application->getApplicant());
         $this->assertEquals($file, $application->getFile());
     }
}