<?php

namespace ApplicationBundle\Entity\ValueObject;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Applicant
 * @package ApplicationBundle\ValueObject
 * @ORM\Embeddable
 */
final class Applicant
{
    /**
     *  @var string
     *  @Assert\Email()
     *  @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Email constructor.
     * @param string $email
     * @param string $name
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}
