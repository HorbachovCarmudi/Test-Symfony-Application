<?php

namespace ApplicationBundle\Entity;

use ApplicationBundle\Entity\ValueObject\Applicant;
use ApplicationBundle\Entity\ValueObject\File;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Application
 * @package ApplicationBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="application")
 */

class Application
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Applicant
     * @ORM\Embedded(class = "ApplicationBundle\Entity\ValueObject\Applicant", columnPrefix = false)
     */
    private $applicant;

    /**
     * @var File
     * @ORM\Embedded(class = "ApplicationBundle\Entity\ValueObject\File", columnPrefix = "file_")
     */
    private $file;

    /**
     * Application constructor.
     * @param Applicant $applicant
     * @param File $file
     */
    public function __construct(Applicant $applicant, File $file)
    {
        $this->applicant = $applicant;
        $this->file = $file;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Applicant
     */
    public function getApplicant()
    {
        return $this->applicant;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }
}
