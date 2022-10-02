<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

final class Permutations
{
    /**
     * @template T
     * @param list<T> $values
     * @return non-empty-list<list<T>>
     */
    public static function of(array $values): array
    {
        return self::heapPermutations($values, count($values));
    }

    /**
     * @template T
     * @param array<T> $values
     * @return non-empty-list<list<T>>
     *
     * @see https://en.wikipedia.org/wiki/Heap%27s_algorithm
     */
    private static function heapPermutations(array &$values, int $size): array
    {
        if ($size === 1) {
            return [array_values($values)];
        }

        $result = [];

        for ($i = 0; $i < $size; $i++) {
            $result[] = self::heapPermutations($values, $size - 1);

            if ($size % 2 === 0) {
                [$values[$i], $values[$size - 1]] = [$values[$size - 1], $values[$i]];
            } else {
                [$values[$size - 1], $values[0]] = [$values[0], $values[$size - 1]];
            }
        }

        return array_merge(...$result);
    }
}
