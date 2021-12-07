<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day07;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $positions = $input->split(',')->map(static fn(Input $v) => $v->asInt())->asArray();

        return self::minFuelRequiredToAlignCrabs($positions, static fn(int $x) => $x);
    }

    /**
     * @param list<int> $positions
     * @param callable(int):int $func
     */
    private static function minFuelRequiredToAlignCrabs(array $positions, callable $func): int
    {
        return min(
            array_map(
                static fn(int $target) => self::fuelToGetToTarget($positions, $target, $func),
                range(0, max(...$positions))
            )
        );
    }

    /**
     * @param list<int> $positions
     * @param callable(int):int $func
     */
    private static function fuelToGetToTarget(array $positions, int $target, callable $func): int
    {
        return array_sum(
            array_map(
                static fn(int $position) => $func(abs($position - $target)),
                $positions
            )
        );
    }

    public function partTwo(Input $input): int
    {
        $positions = $input->split(',')->map(static fn(Input $v) => $v->asInt())->asArray();

        return self::minFuelRequiredToAlignCrabs($positions, static fn(int $x) => (int)($x * ($x + 1) / 2));
    }
}
