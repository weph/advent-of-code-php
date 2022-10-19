<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day10;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @param list<int> $adapters
 * @return array<int, int>
 */
function differences(array $adapters): array
{
    sort($adapters);

    $differences = array_fill(1, 3, 0);

    $lastAdapter = 0;
    foreach ($adapters as $adapter) {
        $diff = $adapter - $lastAdapter;

        $differences[$diff]++;

        $lastAdapter = $adapter;
    }

    $differences[3]++;

    return $differences;
}

/**
 * @param list<int> $adapters
 * @param array<int, int> $cache
 */
function totalCombinations(array $adapters, int $current = 0, array &$cache = []): int
{
    if (array_key_exists($current, $cache)) {
        return $cache[$current];
    }

    if ($adapters === []) {
        return 1;
    }

    $total = 0;

    sort($adapters);
    foreach ($adapters as $index => $adapter) {
        if (!in_array($adapter - $current, [1, 2, 3])) {
            break;
        }

        $cache[$adapter] = totalCombinations(array_slice($adapters, $index + 1), $adapter, $cache);

        $total += $cache[$adapter];
    }

    return $total;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $differences = differences($input->integers());

        return $differences[1] * $differences[3];
    }

    public function partTwo(Input $input): int
    {
        return totalCombinations($input->integers());
    }
}
