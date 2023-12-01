<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day03;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Line;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $grid = $this->grid($input);

        return min(
            array_map(
                static fn(string $s) => abs(Point::fromString($s)->x) + abs(Point::fromString($s)->y),
                array_keys($this->intersections($grid))
            )
        );
    }

    public function partTwo(Input $input): int
    {
        return (int)min(array_map(array_sum(...), $this->intersections($this->grid($input))));
    }

    /**
     * @return array<string, array<int, int>>
     */
    private function grid(Input $input): array
    {
        $grid = [];

        foreach ($input->lines()->asArray() as $wire => $line) {
            preg_match_all('/([RLUD])(\d+),?/', $line, $matches, PREG_SET_ORDER);

            $current = new Point(0, 0);
            $steps = 0;
            foreach ($matches as $match) {
                $direction = $match[1];
                $distance = (int)$match[2];

                $next = match ($direction) {
                    'R' => $current->addX($distance),
                    'L' => $current->addX(-$distance),
                    'U' => $current->addY($distance),
                    'D' => $current->addY(-$distance),
                };

                foreach (array_slice((new Line($current, $next))->points(), 1) as $point) {
                    $grid[$point->asString()][$wire] = ++$steps;
                }

                $current = $next;
            }
        }

        return $grid;
    }

    /**
     * @param array<string, array<int, int>> $grid
     * @return non-empty-array<string, array<int, int>>
     */
    private function intersections(array $grid): array
    {
        $intersections = array_filter($grid, static fn(array $v) => count($v) > 1);

        if ($intersections === []) {
            throw new RuntimeException('No intersections found');
        }

        return $intersections;
    }
}
