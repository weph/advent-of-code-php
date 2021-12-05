<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    private const REGEX = '/^(.+) (\d+)$/';

    public function partOne(Input $input): int
    {
        $instructions = $input->matchLines(self::REGEX);

        $position = 0;
        $depth = 0;

        foreach ($instructions->asArray() as $instruction) {
            match ($instruction[0]) {
                'forward' => $position += (int)$instruction[1],
                'down' => $depth += (int)$instruction[1],
                'up' => $depth -= (int)$instruction[1],
            };
        }

        return $position * $depth;
    }

    public function partTwo(Input $input): int
    {
        $instructions = $input->matchLines(self::REGEX);

        $position = 0;
        $depth = 0;
        $aim = 0;

        foreach ($instructions->asArray() as $instruction) {
            switch ($instruction[0]) {
                case 'forward':
                    $position += (int)$instruction[1];
                    $depth += $aim * (int)$instruction[1];
                    break;

                case 'down':
                    $aim += (int)$instruction[1];
                    break;

                case 'up':
                    $aim -= (int)$instruction[1];
                    break;
            }
        }

        return $position * $depth;
    }
}
