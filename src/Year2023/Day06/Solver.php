<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day06;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

function distance(int $button, int $time): int
{
    return ($time - $button) * $button;
}

function combinationsToBeat(int $time, int $distance): int
{
    $result = 0;

    for ($i = 0; $i < $time; $i++) {
        if (distance($i, $time) > $distance) {
            ++$result;
        }
    }

    return $result;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        if (preg_match('/Time:\s+(.+)\nDistance:\s+(.+)/m', $input->raw(), $matches) !== 1) {
            throw new \RuntimeException('Invalid input');
        }

        $times = array_map('\intval', preg_split('/\s+/', $matches[1]));
        $distances = array_map('\intval', preg_split('/\s+/', $matches[2]));

        $combinations = [];
        foreach ($times as $index => $time) {
            $combinations[] = combinationsToBeat($time, $distances[$index]);
        }

        return array_product($combinations);
    }

    public function partTwo(Input $input): int|float
    {
        if (preg_match('/Time:\s+(.+)\nDistance:\s+(.+)/m', $input->raw(), $matches) !== 1) {
            throw new \RuntimeException('Invalid input');
        }

        $time = (int)preg_replace('/\s+/', '', $matches[1]);
        $distance = (int)preg_replace('/\s+/', '', $matches[2]);

        return combinationsToBeat($time, $distance);
    }
}
