<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day09;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @param list<int> $values
 *
 * @psalm-pure
 */
function allZeros(array $values): bool
{
    return array_sum($values) === 0;
}

/**
 * @param list<int> $values
 * @return list<int>
 *
 * @psalm-pure
 */
function differences(array $values): array
{
    $result = [];

    for ($i = 0; $i < count($values) - 1; $i++) {
        $result[] = $values[$i + 1] - $values[$i];
    }

    return $result;
}

/**
 * @param list<int> $values
 * @return list<list<int>>
 *
 * @psalm-pure
 */
function seqs(array $values): array
{
    $seqs = [$values];

    do {
        $next = differences($values);

        $seqs[] = $next;
        $values = $next;
    } while (!allZeros($next));

    return $seqs;
}

/**
 * @param list<list<int>> $seqs
 * @param callable(int, int):int $operation
 *
 * @psalm-pure
 */
function nextValue(array $seqs, callable $operation): int
{
    $seqs[array_key_last($seqs)][] = 0;

    for ($i = count($seqs) - 2; $i >= 0; $i--) {
        $seqs[$i][] = $operation($seqs[$i][array_key_last($seqs[$i])], $seqs[$i + 1][array_key_last($seqs[$i + 1])]);
    }

    return $seqs[0][array_key_last($seqs[0])];
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        return $input->lines()
            ->map(static function (string $line) {
                $values = array_map('\intval', explode(' ', $line));
                $seqs = seqs($values);

                return nextValue($seqs, static fn(int $a, int $b) => $a + $b);
            })
            ->sum();
    }

    public function partTwo(Input $input): int|float
    {
        return $input->lines()
            ->map(static function (string $line) {
                $values = array_map('\intval', explode(' ', $line));
                $seqs = array_map('\array_reverse', seqs($values));

                return nextValue($seqs, static fn(int $a, int $b) => $a - $b);
            })
            ->sum();
    }
}
