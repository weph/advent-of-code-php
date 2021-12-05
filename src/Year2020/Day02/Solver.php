<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function ord;

final class Solver implements PuzzleSolver
{
    private const REGEX = '/^(\d+)-(\d+) (.): (.+)$/';

    public function partOne(Input $input): int
    {
        return $input->matchLines(self::REGEX)
            ->filter(static fn(array $v) => self::validOne((int)$v[0], (int)$v[1], $v[2], $v[3]))
            ->count();
    }

    /**
     * @psalm-pure
     */
    private static function validOne(int $min, int $max, string $char, string $password): bool
    {
        $ord = ord($char);
        $chars = count_chars($password);

        return $chars[$ord] >= $min && $chars[$ord] <= $max;
    }

    public function partTwo(Input $input): int
    {
        return $input->matchLines(self::REGEX)
            ->filter(static fn(array $v) => self::validTwo((int)$v[0], (int)$v[1], $v[2], $v[3]))
            ->count();
    }

    /**
     * @psalm-pure
     */
    private static function validTwo(int $p1, int $p2, string $char, string $password): bool
    {
        return $password[$p1 - 1] === $char xor $password[$p2 - 1] === $char;
    }
}
