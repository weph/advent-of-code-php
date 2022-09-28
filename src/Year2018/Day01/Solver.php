<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day01;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return (int)array_sum($input->lines()->asArray());
    }

    public function partTwo(Input $input): int
    {
        $current = 0;
        $currents = [0 => 1];

        while (true) {
            foreach ($input->lines()->asArray() as $value) {
                $current += (int)$value;

                $currents[$current] = ($currents[$current] ?? 0) + 1;

                if ($currents[$current] === 2) {
                    return $current;
                }
            }
        }
    }
}
