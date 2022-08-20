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
        return array_sum($input->lines()->map(fn(string $s) => self::wrappingPaperSize($s))->asArray());
    }

    public function partTwo(Input $input): int
    {
        return array_sum($input->lines()->map(fn(string $s) => self::ribbonLength($s))->asArray());
    }

    /**
     * @psalm-pure
     */
    private static function ribbonLength(string $input): int
    {
        $sides = self::sides($input);
        sort($sides);

        return array_sum(array_slice($sides, 0, 2)) * 2 + array_product($sides);
    }

    /**
     * @return array{0: int, 1: int, 2: int}
     *
     * @psalm-pure
     */
    private static function sides(string $input): array
    {
        preg_match('/(\d+)x(\d+)x(\d+)/', $input, $matches);

        return [(int)$matches[1], (int)$matches[2], (int)$matches[3]];
    }

    /**
     * @psalm-pure
     */
    private static function wrappingPaperSize(string $input): int
    {
        [$l, $w, $h] = self::sides($input);

        $areas = [$l * $w, $w * $h, $h * $l];
        $smallest = min($areas);

        return 2 * array_sum($areas) + $smallest;
    }
}
