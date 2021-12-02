<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day01;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function array_slice;
use function count;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return self::numberOfIncrements($input->integers());
    }

    private static function numberOfIncrements(array $values): int
    {
        $increased = 0;
        $count = count($values);

        for ($i = 1; $i < $count; $i++) {
            if ($values[$i] > $values[$i - 1]) {
                ++$increased;
            }
        }

        return $increased;
    }

    public function partTwo(Input $input): int
    {
        $values = $input->integers();
        $slices = array_map(static fn(int $i) => array_sum(array_slice($values, $i, 3)), range(0, count($values)));

        return self::numberOfIncrements($slices);
    }
}
