<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day08;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;
use AdventOfCode\Common\Screen;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->processInstructions($input)->litPixels();
    }

    public function partTwo(Input $input): string
    {
        return "\n" . $this->processInstructions($input)->asString();
    }

    public function processInstructions(Input $input): Screen
    {
        $screen = new Screen(50, 6);

        foreach ($input->lines()->asArray() as $line) {
            if (preg_match('/rect (\d+)x(\d+)/', $line, $matches) === 1) {
                $screen->turnOn(new Point(0, 0), new Point((int)$matches[1] - 1, (int)$matches[2] - 1));
            }

            if (preg_match('/rotate column x=(\d+) by (\d+)/', $line, $matches) === 1) {
                $screen->rotateColumn((int)$matches[1], (int)$matches[2]);
            }

            if (preg_match('/rotate row y=(\d+) by (\d+)/', $line, $matches) === 1) {
                $screen->rotateRow((int)$matches[1], (int)$matches[2]);
            }
        }

        return $screen;
    }
}
