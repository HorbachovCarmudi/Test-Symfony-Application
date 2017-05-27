<?php

namespace ApplicationBundle\Entity\ValueObject;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class File
 * @package ApplicationBundle\ValueObject
 * @ORM\Embeddable
 */
final class Address
{
    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(type="string", options={"default" : ""})
     */
    private $address = '';

    /**
     * Email constructor.
     * @param string $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress() : string
    {
        return $this->address;
    }
}

