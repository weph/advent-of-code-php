<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2019\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    
    #[DataProvider('fuelRequiredForMassExamples')]
    #[Test]
    public function calculate_fuel_for_mass(int $mass, int $expectedFuel): void
    {
        self::assertSame($expectedFuel, fuelRequiredForMass($mass));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int}>
     */
    public static function fuelRequiredForMassExamples(): iterable
    {
        yield [12, 2];
        yield [14, 2];
        yield [1969, 654];
        yield [100756, 33583];
    }

    
    #[DataProvider('fuelRequiredForMassAndFuelExamples')]
    #[Test]
    public function calculate_fuel_for_mass_and_fuel(int $mass, int $expectedFuel): void
    {
        self::assertSame($expectedFuel, fuelRequiredForMassAndFuel($mass));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int}>
     */
    public static function fuelRequiredForMassAndFuelExamples(): iterable
    {
        yield [12, 2];
        yield [1969, 966];
        yield [100756, 50346];
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(656, $this->subject->partOne(Input::fromArray([12, 1969])));
    }

    #[Test]
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
