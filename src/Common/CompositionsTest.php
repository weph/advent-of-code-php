<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Common\Compositions::class)]
final class CompositionsTest extends TestCase
{
    /**
     * @param list<list<int>> $expected
     */
    #[DataProvider('examples')]
    #[Test]
    public function compositions(int $n, int $k, array $expected): void
    {
        self::assertEquals($expected, iterator_to_array(Compositions::of($n, $k)));
    }

    /**
     * @return iterable<array-key, array{0: int, 1: int, 2: list<list<int>>}>
     */
    public static function examples(): iterable
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
