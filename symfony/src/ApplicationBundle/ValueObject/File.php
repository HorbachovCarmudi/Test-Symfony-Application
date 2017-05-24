<?php

namespace ApplicationBundle\ValueObject;

/**
 * Class File
 * @package ApplicationBundle\ValueObject
 */

final class File
{
    /**
     * @var string
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
    public function getName()
    {
        return $this->name;
    }
}

