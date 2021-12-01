<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day01;

use AdventOfCode\Common\Input;
use function ord;

final class Solver
{
    private const VALUES = ['(' => 1, ')' => -1];

    public function partOne(Input $input): int
    {
        $counts = count_chars($input->raw());

        return $counts[ord('(')] - $counts[ord(')')];
    }

    public function partTwo(Input $input): int
    {
        $floor = 0;

        foreach ($input->chars() as $index => $char) {
            $floor += self::VALUES[$char] ?? 0;

            if ($floor === -1) {
                return $index + 1;
            }
        }

        return 0;
    }
}
