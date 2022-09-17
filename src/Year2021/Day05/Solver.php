<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day05;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;
use function count;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $points = $input->matchLines('/(\d+),(\d+) -> (\d+),(\d+)/')
            ->map(static fn(array $v) => new Line(new Point((int)$v[0], (int)$v[1]), new Point((int)$v[2], (int)$v[3])))
            ->filter(static fn(Line $line) => $line->isHorizontal() || $line->isVertical())
            ->map(static fn(Line $line) => array_map(static fn(Point $p) => $p->asString(), $line->points()))
            ->asArray();

        return $this->intersectionCount($points);
    }

    /**
     * @param list<list<string>> $points
     */
    private function intersectionCount(array $points): int
    {
        return count(array_filter(array_count_values(array_merge(...$points)), static fn(int $i) => $i > 1));
    }

    public function partTwo(Input $input): int
    {
        $points = $input->matchLines('/(\d+),(\d+) -> (\d+),(\d+)/')
            ->map(static fn(array $v) => new Line(new Point((int)$v[0], (int)$v[1]), new Point((int)$v[2], (int)$v[3])))
            ->map(static fn(Line $line) => array_map(static fn(Point $p) => $p->asString(), $line->points()))
            ->asArray();

        return $this->intersectionCount($points);
    }
}
