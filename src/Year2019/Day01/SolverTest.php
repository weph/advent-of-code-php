<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2019\Day01\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     *
     * @dataProvider fuelRequiredForMassExamples
     */
    public function calculate_fuel_for_mass(int $mass, int $expectedFuel): void
    {
        self::assertSame($expectedFuel, fuelRequiredForMass($mass));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int}>
     */
    public function fuelRequiredForMassExamples(): iterable
    {
        yield [12, 2];
        yield [14, 2];
        yield [1969, 654];
        yield [100756, 33583];
    }

    /**
     * @test
     *
     * @dataProvider fuelRequiredForMassAndFuelExamples
     */
    public function calculate_fuel_for_mass_and_fuel(int $mass, int $expectedFuel): void
    {
        self::assertSame($expectedFuel, fuelRequiredForMassAndFuel($mass));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int}>
     */
    public function fuelRequiredForMassAndFuelExamples(): iterable
    {
        yield [12, 2];
        yield [1969, 966];
        yield [100756, 50346];
    }

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(656, $this->subject->partOne(Input::fromArray([12, 1969])));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(968, $this->subject->partTwo(Input::fromArray([12, 1969])));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
