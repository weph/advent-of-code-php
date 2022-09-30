<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day01;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @psalm-pure
 */
function fuelRequiredForMass(int $mass): int
{
    return (int)floor($mass / 3) - 2;
}

/**
 * @psalm-pure
 */
function fuelRequiredForMassAndFuel(int $mass): int
{
    $fuel = (int)floor($mass / 3) - 2;
    if ($fuel < 0) {
        return 0;
    }

    return $fuel + fuelRequiredForMassAndFuel($fuel);
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return array_sum(
            $input->lines()
                ->map(static fn(string $s) => fuelRequiredForMass((int)$s))
                ->asArray()
        );
    }

    public function partTwo(Input $input): int
    {
        return array_sum(
            $input->lines()
                ->map(static fn(string $s) => fuelRequiredForMassAndFuel((int)$s))
                ->asArray()
        );
    }
}
