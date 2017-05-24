<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\Application;
use ApplicationBundle\ValueObject\Applicant;
use ApplicationBundle\ValueObject\File;

class BlogTest extends \PHPUnit_Framework_TestCase
{
     public function testConstructor()
     {
         $applicant = new Applicant('email', 'name');
         $file = new File('filename');

         $application = new Application($applicant, $file);
         $this->assertEquals($applicant, $application->getApplicant());
     }
}