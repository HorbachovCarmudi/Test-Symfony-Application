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
     * @var string
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $created_at;

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
     * @return string
     */
    public function getCreatedAt() : string
    {
        return date_format($this->created_at, 'm-d H:i:s');
    }

    /**
     * @return integer
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return Applicant
     */
    public function getApplicant() : Applicant
    {
        return $this->applicant;
    }

    /**
     * @return File
     */
    public function getFile() : File
    {
        return $this->file;
    }
}
