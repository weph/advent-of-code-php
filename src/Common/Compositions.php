<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use Generator;

final class Compositions
{
    /**
     * @return Generator<list<int>>
     */
    public static function of(int $n, int $k): Generator
    {
        $x = array_fill(0, $k, 1);
        $x[$k - 1] = $n - $k + 1;

        yield array_values($x);

        while ($x[0] !== $n - $k + 1) {
            $last = $k - 1;
            while ($x[$last] === 1) {
                --$last;
            }

            $z = $x[$last];
            ++$x[$last - 1];
            $x[$last] = 1;
            $x[$k - 1] = $z - 1;

            yield array_values($x);
        }
    }
}
