<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use Generator;

final class Combinations
{
    /**
     * @template T
     * @param array<T> $values
     * @return Generator<list<T>>
     */
    public static function of(array $values, int $n): Generator
    {
        $valuesAsList = array_values($values);

        foreach (range(0, count($valuesAsList) - $n) as $i) {
            if ($n === 1) {
                yield [$valuesAsList[$i]];
            } else {
                foreach (self::of(array_slice($valuesAsList, $i + 1), $n - 1) as $next) {
                    yield [$valuesAsList[$i], ...$next];
                }
            }
        }
    }

    /**
     * @template T
     * @param list<T> $values
     * @return Generator<list<T>>
     */
    public static function all(array $values): Generator
    {
        foreach (range(1, count($values)) as $n) {
            foreach (self::of($values, $n) as $combination) {
                yield $combination;
            }
        }
    }
}
