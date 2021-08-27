<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day01;

use function ord;

final class Solver
{
    private const VALUES = ['(' => 1, ')' => -1];

    public function partOne(string $input): int
    {
        $counts = count_chars($input);

        return $counts[ord('(')] - $counts[ord(')')];
    }

    public function partTwo(string $input): int
    {
        $floor = 0;

        foreach (str_split($input) as $index => $char) {
            $floor += self::VALUES[$char] ?? 0;

            if ($floor === -1) {
                return $index + 1;
            }
        }

        return 0;
    }
}
