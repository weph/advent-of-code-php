<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use Generator;

final class Combinations
{
    /**
     * @param list<scalar> $values
     * @param int $n
     * @return Generator<list<scalar>>
     */
    public static function of(array $values, int $n): Generator
    {
        foreach (range(0, count($values) - $n) as $i) {
            if ($n === 1) {
                yield [$values[$i]];
            } else {
                foreach (self::of(array_slice($values, $i + 1), $n - 1) as $next) {
                    yield [$values[$i], ...$next];
                }
            }
        }
    }
}