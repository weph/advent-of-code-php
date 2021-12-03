<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

interface PuzzleSolver
{
    public function partOne(Input $input): int|float|string;

    public function partTwo(Input $input): int|float|string;
}
