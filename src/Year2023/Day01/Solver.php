<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day01;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

const DIGITS = [
    '1' => 1,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
];

const SPELLED_OUT_DIGITS = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];

/**
 * @param array<int> $digits
 *
 * @psalm-pure
 */
function firstDigit(string $s, array $digits): int
{
    foreach (range(0, strlen($s)) as $i) {
        foreach ($digits as $a => $b) {
            if (str_starts_with(substr($s, $i), (string)$a)) {
                return $b;
            }
        }
    }

    throw new \RuntimeException(sprintf('No digit found in string "%s"', $s));
}

/**
 * @param array<int> $digits
 *
 * @psalm-pure
 */
function lastDigit(string $s, array $digits): int
{
    foreach (range(strlen($s), 0) as $i) {
        foreach ($digits as $a => $b) {
            if (str_starts_with(substr($s, $i), (string)$a)) {
                return $b;
            }
        }
    }

    throw new \RuntimeException(sprintf('No digit found in string "%s"', $s));
}

/**
 * @param array<int> $digits
 *
 * @psalm-pure
 */
function firstAndLastDigit(string $s, array $digits): int
{
    return (int)sprintf('%d%d', firstDigit($s, $digits), lastDigit($s, $digits));
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        return $input->lines()
            ->map(static fn(string $s) => firstAndLastDigit($s, DIGITS))
            ->sum();
    }

    public function partTwo(Input $input): int|float
    {
        return $input->lines()
            ->map(static fn(string $s) => firstAndLastDigit($s, DIGITS + SPELLED_OUT_DIGITS))
            ->sum();
    }
}
