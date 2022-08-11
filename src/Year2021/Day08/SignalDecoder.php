<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day08;

use RuntimeException;
use function strlen;

final class SignalDecoder
{
    private static array $bits = ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 8, 'e' => 16, 'f' => 32, 'g' => 64];

    /**
     * @var list<string>
     */
    private static array $digits = [
        'abcefg',
        'cf',
        'acdeg',
        'acdfg',
        'bcdf',
        'abdfg',
        'abdefg',
        'acf',
        'abcdefg',
        'abcdfg',
    ];

    /**
     * @param list<string> $uniquePatterns
     * @param list<string> $display
     */
    public static function decode(array $uniquePatterns, array $display): int
    {
        $s = [];

        $lengths = [];
        foreach ($uniquePatterns as $pattern) {
            $lengths[strlen($pattern)][] = self::toInt($pattern);
        }

        $s['a'] = self::diff($lengths[3], $lengths[2][0]);
        $s['g'] = self::diff($lengths[6], $lengths[4][0] | $s['a']);
        $s['d'] = self::diff($lengths[5], $lengths[2][0] | $s['a'] | $s['g']);
        $s['e'] = self::diff($lengths[7], $lengths[4][0] | $s['a'] | $s['g']);
        $s['b'] = self::diff($lengths[7], $lengths[3][0] | $s['d'] | $s['g'] | $s['e']);
        $s['f'] = self::diff($lengths[6], $s['a'] | $s['b'] | $s['d'] | $s['e'] | $s['g']);
        $s['c'] = self::diff($lengths[2], $s['f']);

        $mapping = array_flip(array_map(static fn(int $x) => array_search($x, self::$bits, true), $s));

        return (int)implode(array_map(static fn(string $x) => self::displayValue($x, $mapping), $display));
    }

    private static function toInt(string $input): int
    {
        return array_sum(array_map(static fn(string $x) => self::$bits[$x], str_split($input)));
    }

    /**
     * @param list<int> $a
     */
    private static function diff(array $a, int $b): int
    {
        foreach ($a as $x) {
            if (($x & $b) !== $b) {
                continue;
            }

            return $x & ~$b;
        }

        throw new RuntimeException(
            sprintf('None of %s contains %s', implode(', ', array_map('decbin', $a)), decbin($b))
        );
    }

    /**
     * @param array<string, int> $mapping
     */
    private static function displayValue(string $input, array $mapping): int
    {
        $chars = str_split(strtr($input, $mapping));
        sort($chars);

        return array_search(implode($chars), self::$digits);
    }
}
