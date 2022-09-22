<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day07;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $input->lines()
            ->map(static fn(string $s) => IPv7Address::fromString($s))
            ->filter(static fn(IPv7Address $a) => $a->supportsTLS())
            ->count();
    }

    public function partTwo(Input $input): int
    {
        return $input->lines()
            ->map(static fn(string $s) => IPv7Address::fromString($s))
            ->filter(static fn(IPv7Address $a) => $a->supportsSSL())
            ->count();
    }
}
