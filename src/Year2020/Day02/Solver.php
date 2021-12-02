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
        $entries = $input->matchLines(self::REGEX);

        $valid = 0;
        foreach ($entries as $entry) {
            if ($this->validOne((int)$entry[0], (int)$entry[1], $entry[2], $entry[3])) {
                ++$valid;
            }
        }

        return $valid;
    }

    private function validOne(int $min, int $max, string $char, string $password): bool
    {
        $ord = ord($char);
        $chars = count_chars($password);

        return $chars[$ord] >= $min && $chars[$ord] <= $max;
    }

    public function partTwo(Input $input): int
    {
        $entries = $input->matchLines(self::REGEX);

        $valid = 0;
        foreach ($entries as $entry) {
            if ($this->validTwo((int)$entry[0], (int)$entry[1], $entry[2], $entry[3])) {
                ++$valid;
            }
        }

        return $valid;
    }

    private function validTwo(int $p1, int $p2, string $char, string $password): bool
    {
        return $password[$p1 - 1] === $char xor $password[$p2 - 1] === $char;
    }
}
