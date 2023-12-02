<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        return $input->matchLines('/Game (\d+): (.+)/')
            ->filter(static function (array $match) {
                $limits = ['red' => 12, 'green' => 13, 'blue' => 14];

                foreach (explode(';', $match[1]) as $set) {
                    preg_match_all('/(\d+) ([^,]+),?/', $set, $matches, PREG_SET_ORDER);

                    foreach ($matches as $setMatch) {
                        if ((int)$setMatch[1] > $limits[$setMatch[2]]) {
                            return false;
                        }
                    }
                }
                return true;
            })
            ->map(static fn(array $match) => (int)$match[0])
            ->sum();
    }

    public function partTwo(Input $input): int|float
    {
        return $input->matchLines('/Game (\d+): (.+)/')
            ->map(static function (array $match) {
                $cubes = [];

                foreach (explode(';', $match[1]) as $set) {
                    preg_match_all('/(\d+) ([^,]+),?/', $set, $matches, PREG_SET_ORDER);

                    foreach ($matches as $setMatch) {
                        $cubes[$setMatch[2]] = max((int)$setMatch[1], $cubes[$setMatch[2]] ?? 0);
                    }
                }

                return array_product($cubes);
            })
            ->sum();
    }
}
