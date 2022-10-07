<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Common\Compositions
 */
final class CompositionsTest extends TestCase
{
    /**
     * @param list<list<int>> $expected
     *
     * @test
     * @dataProvider examples
     */
    public function compositions(int $n, int $k, array $expected): void
    {
        self::assertEquals($expected, iterator_to_array(Compositions::of($n, $k)));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int, 2: list<list<int>>}>
     */
    public function examples(): iterable
    {
        yield [
            10,
            1,
            [
                [10]
            ]
        ];

        yield [
            4,
            2,
            [
                [1, 3],
                [2, 2],
                [3, 1],
            ]
        ];

        yield [
            4,
            3,
            [
                [1, 1, 2],
                [1, 2, 1],
                [2, 1, 1],
            ]
        ];
    }
}
