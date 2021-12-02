<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function array_slice;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return array_sum(array_map([$this, 'wrappingPaperSize'], $input->lines()));
    }

    public function partTwo(Input $input): int
    {
        return array_sum(array_map([$this, 'ribbonLength'], $input->lines()));
    }

    private function ribbonLength(string $input): int
    {
        $sides = $this->sides($input);
        sort($sides);

        return array_sum(array_slice($sides, 0, 2)) * 2 + array_product($sides);
    }

    /**
     * @return array{0: int, 1: int, 2: int}
     */
    private function sides(string $input): array
    {
        preg_match('/(\d+)x(\d+)x(\d+)/', $input, $matches);

        return [(int)$matches[1], (int)$matches[2], (int)$matches[3]];
    }

    private function wrappingPaperSize(string $input): int
    {
        [$l, $w, $h] = $this->sides($input);

        $areas    = [$l * $w, $w * $h, $h * $l];
        $smallest = min($areas);

        return 2 * array_sum($areas) + $smallest;
    }
}
