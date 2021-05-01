<?php

namespace Tleckie\Enum\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tleckie\Enum\EnumInterface;
use Tleckie\Enum\Enum;

/**
 * Class EnumTest
 *
 * @package Tleckie\Enum
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class EnumTest extends TestCase
{
    /** @var EnumInterface */
    private EnumInterface $enum;

    /**
     * @test
     * @param mixed $expected
     * @param mixed $input
     * @dataProvider callDataProvider
     */
    public function call(mixed $expected, mixed $input): void
    {
        $this->assertEquals($expected, $input);
    }

    /**
     * @test
     */
    public function invalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new DummyEnum(20);
    }

    /**
     * @test
     */
    public function invalidMethod(): void
    {
        $this->expectException(InvalidArgumentException::class);
        (new DummyEnum(2))::INVALID();
    }

    /**
     * @test
     */
    public function keysValues(): void
    {
        $this->enum = new DummyEnum(5);
        static::assertEquals(["VALUE1", "VALUE2", "VALUE5"], $this->enum->getKeys());
        static::assertEquals([0 => 1, 1=> 2, 2=> 5], $this->enum->getValues());
    }

    /**
     * @return array
     */
    public function callDataProvider(): array
    {
        $this->enum = new DummyEnum(5);

        return [
            [
                "1", $this->enum::VALUE1()
            ],
            [
                "2", $this->enum::VALUE2(),
            ],
            [
                "5", new DummyEnum(new DummyEnum(5)),
            ],
            [
                "5", $this->enum->getValue(),
            ],
            [
                "VALUE5", $this->enum->getKey(),
            ],
            [
                ["VALUE1" => 1, "VALUE2" => 2, "VALUE5" => 5], $this->enum->toArray(),
            ]
        ];
    }
}

/**
 * @codeCoverageIgnore
 * Class DummyEnum
 *
 * @package Tleckie\Enum
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class DummyEnum extends Enum
{
    public const VALUE1 = 1;

    public const VALUE2 = 2;

    public const VALUE5 = 5;
}
