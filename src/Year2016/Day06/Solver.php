<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day06;

use AdventOfCode\Common\CharacterCount;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): string
    {
        return $input->columns()
            ->map(static fn(string $c) => CharacterCount::fromString($c)->mostCommon())
            ->join();
    }

    public function partTwo(Input $input): string
    {
        return $input->columns()
            ->map(static fn(string $c) => CharacterCount::fromString($c)->leastCommon())
            ->join();
    }
}
