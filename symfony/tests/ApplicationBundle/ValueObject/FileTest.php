<?php

namespace ApplicationBundle\Tests\Entity;

use ApplicationBundle\Entity\ValueObject\File;

/**
 * Class FileTest
 * @package ApplicationBundle\Tests\Entity
 */
class FileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test constructor and getter
     */
    public function testConstructor()
     {
         $correctFileName = 'filename';
         $file = new File($correctFileName);
         $this->assertEquals($correctFileName, $file->getName());
     }
}