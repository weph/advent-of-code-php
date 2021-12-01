<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day01;

use function array_slice;
use function count;

final class Solver
{
    public function partOne(string $input): int
    {
        $measurements = array_map('\intval', explode("\n", $input));

        return self::numberOfIncrements($measurements);
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

    public function partTwo(string $input): int
    {
        $values = array_map('\intval', explode("\n", $input));

        $slices = array_map(static fn(int $i) => array_sum(array_slice($values, $i, 3)), range(0, count($values)));

        return self::numberOfIncrements($slices);
    }
}
