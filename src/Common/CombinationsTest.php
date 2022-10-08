<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Common\Combinations
 */
final class CombinationsTest extends TestCase
{
    /**
     * @param list<scalar> $values
     * @param list<list<scalar>> $expected
     *
     * @test
     * @dataProvider examples
     */
    public function combinations(array $values, int $n, array $expected): void
    {
        self::assertEquals($expected, iterator_to_array(Combinations::of($values, $n)));
    }

    /**
     * @return iterable<array-key, array{0: list<scalar>, 1: int, 2: list<list<scalar>>}>
     */
    public function examples(): iterable
    {
        yield [
            [1, 2, 3, 4],
            2,
            [
                [1, 2],
                [1, 3],
                [1, 4],
                [2, 3],
                [2, 4],
                [3, 4]
            ]
        ];

        yield [
            [1, 2, 3, 4],
            3,
            [
                [1, 2, 3],
                [1, 2, 4],
                [1, 3, 4],
                [2, 3, 4],
            ]
        ];
    }
}
