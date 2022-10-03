<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day12;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

function countNumbers(mixed $data): int
{
    return match (true) {
        is_int($data) => $data,
        is_array($data) => array_sum(array_map(static fn(mixed $x) => countNumbers($x), $data)),
        is_object($data) && !in_array('red', get_object_vars($data)) => array_sum(array_map(static fn(mixed $x) => countNumbers($x), get_object_vars($data))),
        default => 0
    };
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        preg_match_all('/(-?\d+)/', $input->raw(), $matches);

        return (int)array_sum($matches[0]);
    }

    public function partTwo(Input $input): int
    {
        return countNumbers(json_decode($input->raw(), false));
    }
}
