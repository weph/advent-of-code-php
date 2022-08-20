<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day05;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $input->lines()
            ->filter(static function (string $s) {
                return preg_match('/ab|cd|pq|xy/', $s) === 0 &&
                    preg_match('/(.)\1/', $s) === 1 &&
                    preg_match_all('/[aeiou]/', $s) > 2;
            })
            ->count();
    }

    public function partTwo(Input $input): int
    {
        return $input->lines()
            ->filter(function (string $s) {
                return preg_match('/(..).*\1/', $s) === 1 &&
                    preg_match('/(.).\1/', $s) === 1;
            })
            ->count();
    }
}
