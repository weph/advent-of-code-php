<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Common\Permutations::class)]
final class PermutationsTest extends TestCase
{
    /**
     * @param list<string> $expected
     */
    #[DataProvider('examples')]
    #[Test]
    public function permutations(string $input, array $expected): void
    {
        $values = explode(',', $input);

        $result = Permutations::of($values);

        self::assertEquals($expected, array_map(static fn(array $v) => implode(',', $v), $result));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: list<string>}>
     */
    public static function examples(): iterable
    {
        yield [
            'a',
            [
                'a'
            ]
        ];

        yield [
            'a,b',
            [
                'a,b',
                'b,a'
            ]
        ];

        yield [
            'a,b,c',
            [
                'a,b,c',
                'b,a,c',
                'c,a,b',
                'a,c,b',
                'b,c,a',
                'c,b,a'
            ]
        ];

        yield [
            'a,b,c,d',
            [
                'a,b,c,d',
                'b,a,c,d',
                'c,a,b,d',
                'a,c,b,d',
                'b,c,a,d',
                'c,b,a,d',

                'd,b,c,a',
                'b,d,c,a',
                'c,d,b,a',
                'd,c,b,a',
                'b,c,d,a',
                'c,b,d,a',

                'd,a,c,b',
                'a,d,c,b',
                'c,d,a,b',
                'd,c,a,b',
                'a,c,d,b',
                'c,a,d,b',

                'd,a,b,c',
                'a,d,b,c',
                'b,d,a,c',
                'd,b,a,c',
                'a,b,d,c',
                'b,a,d,c',
            ]
        ];
    }
}
