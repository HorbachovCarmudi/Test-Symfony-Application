<?php

namespace ApplicationBundle\Entity\ValueObject;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class File
 * @package ApplicationBundle\ValueObject
 * @ORM\Embeddable
 */
final class File
{
    /**
     * @var string
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * Email constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}

