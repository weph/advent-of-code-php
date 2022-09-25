<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day06;

use AdventOfCode\Common\Grid;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @psalm-suppress UnusedClass
 */
final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $screen = new Grid(999, 999, false);

        foreach ($input->lines()->asArray() as $line) {
            if (preg_match('/(turn on|turn off|toggle) (\d+),(\d+) through (\d+),(\d+)/', $line, $matches) !== 1) {
                throw new \RuntimeException(sprintf('Invalid instruction: %s', $line));
            }

            $screen->process(
                new Point((int)$matches[2], (int)$matches[3]),
                new Point((int)$matches[4], (int)$matches[5]),
                match ($matches[1]) {
                    'turn on' => static fn() => true,
                    'turn off' => static fn() => false,
                    'toggle' => static fn(bool $v) => !$v,
                }
            );
        }

        return count(array_filter($screen->values()));
    }

    public function partTwo(Input $input): int
    {
        $screen = new Grid(999, 999, 0);

        foreach ($input->lines()->asArray() as $line) {
            if (preg_match('/(turn on|turn off|toggle) (\d+),(\d+) through (\d+),(\d+)/', $line, $matches) !== 1) {
                throw new \RuntimeException(sprintf('Invalid instruction: %s', $line));
            }

            $screen->process(
                new Point((int)$matches[2], (int)$matches[3]),
                new Point((int)$matches[4], (int)$matches[5]),
                match ($matches[1]) {
                    'turn on' => static fn(int $v) => $v + 1,
                    'turn off' => static fn(int $v) => $v > 0 ? $v - 1 : 0,
                    'toggle' => static fn(int $v) => $v + 2,
                }
            );
        }

        return (int)array_sum($screen->values());
    }
}
