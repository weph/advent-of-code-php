<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

interface PuzzleSolver
{
    public function partOne(Input $input): int|string;

    public function partTwo(Input $input): int|string;
}
