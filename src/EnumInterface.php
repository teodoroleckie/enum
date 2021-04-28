<?php

namespace Tleckie\Enum;

/**
 * Interface EnumInterface
 *
 * @package Tleckie\Enum
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
interface EnumInterface
{
    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @return mixed[]
     */
    public function getValues(): array;

    /**
     * @return string[]
     */
    public function getKeys(): array;

    /**
     * @return string
     */
    public function getKey(): string;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function __toString(): string;
}
