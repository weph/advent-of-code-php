<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): string
    {
        return $this->solve(
            $input,
            [
                ['1', '2', '3'],
                ['4', '5', '6'],
                ['7', '8', '9']
            ],
            new Point(1, 1)
        );
    }

    /**
     * @param non-empty-list<non-empty-list<string>> $keypad
     */
    private function solve(Input $input, array $keypad, Point $start): string
    {
        $position = $start;

        $code = [];

        foreach ($input->lines()->asArray() as $line) {
            foreach (str_split($line) as $char) {
                $nextPosition = match ($char) {
                    'U' => $position->addY(-1),
                    'D' => $position->addY(1),
                    'L' => $position->addX(-1),
                    'R' => $position->addX(1)
                };

                if (($keypad[$nextPosition->y][$nextPosition->x] ?? ' ') !== ' ') {
                    $position = $nextPosition;
                }
            }

            $code[] = $keypad[$position->y][$position->x];
        }

        return implode($code);
    }

    public function partTwo(Input $input): string
    {
        return $this->solve(
            $input,
            [
                [' ', ' ', '1', ' ', ' '],
                [' ', '2', '3', '4', ' '],
                ['5', '6', '7', '8', '9'],
                [' ', 'A', 'B', 'C', ' '],
                [' ', ' ', 'D', ' ', ' '],
            ],
            new Point(0, 2)
        );
    }
}
