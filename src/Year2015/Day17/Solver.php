<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day17;

use AdventOfCode\Common\Combinations;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function __construct(private readonly int $liters = 150)
    {
    }

    public function partOne(Input $input): int
    {
        $x = 0;

        foreach (Combinations::all($input->integers()) as $combination) {
            if (array_sum($combination) === $this->liters) {
                ++$x;
            }
        }

        return $x;
    }

    public function partTwo(Input $input): int
    {
        $containers = $input->integers();
        $x = array_fill(1, count($containers), 0);

        foreach (Combinations::all($containers) as $combination) {
            if (array_sum($combination) === $this->liters) {
                ++$x[count($combination)];
            }
        }

        return array_values(array_filter($x))[0] ?? -1;
    }
}
