<?php

namespace Tleckie\Enum;

use InvalidArgumentException;
use ReflectionClass;
use function array_key_exists;
use function array_keys;
use function array_search;
use function array_values;

/**
 * Class Enum
 *
 * @package Tleckie\Enum
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Enum implements EnumInterface
{
    /** @var array */
    private static array $constants;

    /** @var mixed */
    private mixed $value;

    /** @var mixed */
    private mixed $key;

    /**
     * Enum constructor.
     *
     * @param mixed $value
     */
    final public function __construct(mixed $value)
    {
        static::$constants = static::constants();

        $value = ($value instanceof EnumInterface) ? $value->getValue() : $value;

        $this->key = static::searchNameByValue($value);
        $this->value = $value;
    }

    /**
     * @return mixed[]
     */
    private static function constants(): array
    {
        $reflection = new ReflectionClass(static::class);

        return $reflection->getConstants();
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return string
     */
    private static function searchNameByValue(mixed $value): string
    {
        $name = array_search($value, static::$constants, true);
        if (false === $name) {
            throw new InvalidArgumentException(sprintf('Constant value [%s] not found', $value));
        }

        return $name;
    }

    /**
     * @param string $name
     * @param array  $arguments
     * @return self
     */
    final public static function __callStatic(string $name, array $arguments): self
    {
        if (!array_key_exists($name, static::$constants)) {
            throw new InvalidArgumentException(sprintf('Constant [%s] is not defined', $name));
        }

        return new static(static::$constants[$name]);
    }

    /**
     * @return mixed[]
     */
    public function getValues(): array
    {
        return array_values(static::$constants);
    }

    /**
     * @return string[]
     */
    public function getKeys(): array
    {
        return array_keys(static::$constants);
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return static::$constants;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
