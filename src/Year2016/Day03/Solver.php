<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day03;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return self::validTriangles(
            $input->lines()
                ->map(static fn(string $v) => preg_split('/\s+/', trim($v)))
                ->asArray()
        );
    }

    private static function validTriangles(array $values): int
    {
        return count(
            array_filter($values,
                function (array $values) {
                    $numbers = array_map(static fn(string $x) => (int)$x, $values);
                    sort($numbers);

                    return $numbers[0] + $numbers[1] > $numbers[2];
                }
            )
        );
    }

    public function partTwo(Input $input): int
    {
        $values = $input->lines()
            ->map(static fn(string $v) => preg_split('/\s+/', trim($v)))
            ->asArray();

        $rowValues = array_chunk([...array_column($values, 0), ...array_column($values, 1), ...array_column($values, 2)], 3);

        return self::validTriangles($rowValues);
    }
}
