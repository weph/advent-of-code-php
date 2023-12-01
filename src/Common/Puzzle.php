<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

final readonly class Puzzle
{
    public function __construct(
        public int $year,
        public int $day,
        public PuzzleSolver $solver
    ) {
    }
}
