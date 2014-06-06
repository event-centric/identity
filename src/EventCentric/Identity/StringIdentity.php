<?php

namespace EventCentric\Identity;

use InvalidArgumentException;

trait StringIdentity
{
    /**
     * @var string
     */
    private $string;

    public function __construct($string)
    {
        self::guardString($string);
        $this->string = $string;
    }

    /**
     * Creates an identifier object from a string representation
     * @param $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static($string);
    }

    /**
     * Returns a string that can be parsed by fromString()
     * @return string
     */
    public function __toString()
    {
        return (string)$this->string;
    }

    /**
     * Compares the object to another IdentifiesAggregate object. Returns true if both have the same type and value.
     * @param Identity $other
     * @return boolean
     */
    public function equals(Identity $other)
    {
        return $other instanceof static && $this->string == $other->string;
    }

    private static function guardString($string)
    {
        if (!is_string($string)) {
            throw new InvalidArgumentException("String expected");
        }
    }
} 