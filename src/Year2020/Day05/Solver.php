<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day05;

use AdventOfCode\Common\Collection;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @psalm-pure
 */
function seatId(string $s): int
{
    return (int)bindec(strtr($s, ['F' => 0, 'B' => 1, 'L' => 0, 'R' => 1]));
}


final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $input->lines()
            ->map(seatId(...))
            ->sort(static fn(int $a, int $b) => $a <=> $b)
            ->last();
    }

    public function partTwo(Input $input): int
    {
        $seatIds = $input->lines()->map(seatId(...));

        return (new Collection(range($seatIds->min(), $seatIds->max())))
            ->diff($seatIds)
            ->first();
    }
}
