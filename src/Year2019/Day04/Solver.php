<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day04;

use AdventOfCode\Common as aoc;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

function digitsOnlyIncrease(string $password): bool
{
    return $password === implode(aoc\sort(str_split($password)));
}

function hasSameAdjacentDigits(string $password): bool
{
    return preg_match('/(.)\1/', $password) === 1;
}

function hasSameAdjacentDigitsPair(string $password): bool
{
    if (preg_match_all('/(.)\1+/', $password, $matches) === 0) {
        return false;
    }

    return array_filter($matches[0], static fn(string $s) => strlen($s) === 2) !== [];
}

function meetsPartOneCriterias(string $password): bool
{
    return hasSameAdjacentDigits($password) && digitsOnlyIncrease($password);
}

function meetsPartTwoCriterias(string $password): bool
{
    return hasSameAdjacentDigitsPair($password) && digitsOnlyIncrease($password);
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return count(array_filter($this->passwordRange($input), meetsPartOneCriterias(...)));
    }

    public function partTwo(Input $input): int
    {
        return count(array_filter($this->passwordRange($input), meetsPartTwoCriterias(...)));
    }

    private function passwordRange(Input $input): array
    {
        return range(...array_map(intval(...), explode('-', $input->raw(), 2)));
    }
}
