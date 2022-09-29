<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day03;

use AdventOfCode\Common\Grid;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $instructions = $this->instructions($input);

        /** @var Grid<list<int>> $grid */
        $grid = new Grid(1000, 1000, []);

        foreach ($instructions as $instruction) {
            $grid->process($instruction[1], $instruction[2], static fn(array $v) => [...$v, $instruction[0]]);
        }

        return count(array_filter($grid->values(), static fn(array $v) => count($v) > 1));
    }

    public function partTwo(Input $input): int
    {
        $instructions = $this->instructions($input);

        /** @var Grid<list<int>> $grid */
        $grid = new Grid(1000, 1000, []);

        foreach ($instructions as $instruction) {
            $grid->process($instruction[1], $instruction[2], static fn(array $v) => [...$v, $instruction[0]]);
        }

        foreach ($instructions as $instruction) {
            $values = array_unique(array_merge(...$grid->valuesAt($instruction[1], $instruction[2])));

            if (count($values) === 1) {
                return $instruction[0];
            }
        }

        throw new RuntimeException('No intact claim found');
    }

    /**
     * @return list<array{0: int, 1: Point, 2: Point}>
     */
    private function instructions(Input $input): array
    {
        $instructions = [];

        foreach ($input->lines()->asArray() as $line) {
            if (preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $line, $matches) !== 1) {
                throw new RuntimeException(sprintf('Invalid line: %s', $line));
            }

            $claim = (int)$matches[1];
            $sx = (int)$matches[2];
            $sy = (int)$matches[3];
            $ex = $sx + (int)$matches[4] - 1;
            $ey = $sy + (int)$matches[5] - 1;

            $instructions[] = [$claim, new Point($sx, $sy), new Point($ex, $ey)];
        }

        return $instructions;
    }
}
