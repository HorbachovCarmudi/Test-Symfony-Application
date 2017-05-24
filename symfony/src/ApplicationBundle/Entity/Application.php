<?php

namespace ApplicationBundle\Entity;

use ApplicationBundle\ValueObject\Applicant;
use ApplicationBundle\ValueObject\File;

/**
 * Class Application
 * @package ApplicationBundle\Entity
 */
class Application
{
    /**
     * @var Applicant
     */
    private $applicant;

    /**
     * @var File
     */
    private $file;

    /**
     * Application constructor.
     * @param $applicant
     * @param $file
     */
    public function __construct($applicant, $file)
    {
        $this->applicant = $applicant;
        $this->file = $file;
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
