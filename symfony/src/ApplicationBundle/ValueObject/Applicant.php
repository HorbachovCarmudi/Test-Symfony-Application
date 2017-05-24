<?php

namespace ApplicationBundle\ValueObject;

/**
 * Class Applicant
 * @package ApplicationBundle\ValueObject
 */
final class Applicant
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * Email constructor.
     * @param string $email
     * @param string $name
     */
    private function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
