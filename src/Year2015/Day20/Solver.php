<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day20;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $target = $input->asInt();

        $houses = array_fill(1, (int)($target / 10), 0);
        for ($i = 1; $i <= $target / 10; $i++) {
            for ($j = $i; $j <= $target / 10; $j += $i) {
                $houses[$j] += $i * 10;
            }
        }

        return (int)array_key_first(array_filter($houses, static fn(int $i) => $i >= $target));
    }

    public function partTwo(Input $input): int
    {
        $target = $input->asInt();

        $houses = array_fill(1, (int)($target / 11), 0);
        for ($i = 1; $i <= $target / 10; $i++) {
            for ($j = $i; $j <= $i * 50 && $j <= $target / 11; $j += $i) {
                $houses[$j] += $i * 11;
            }
        }

        return (int)array_key_first(array_filter($houses, static fn(int $i) => $i >= $target));
    }
}
