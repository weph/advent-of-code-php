<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

final class Puzzle
{
    public function __construct(
        public readonly int $year,
        public readonly int $day,
        public readonly PuzzleSolver $solver
    ) {
    }
}
