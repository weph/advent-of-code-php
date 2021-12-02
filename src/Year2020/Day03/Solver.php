<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day03;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function count;
use function strlen;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->countTrees($input->lines(), 3, 1);
    }

    /**
     * @param list<string> $input
     */
    private function countTrees(array $input, int $mx, int $my): int
    {
        $rows = count($input);
        $trees = 0;
        $x = 0;
        $y = 0;

        while ($y < $rows) {
            $row = $input[$y];

            $trees += (int)($row[$x % strlen($row)] === '#');

            $x += $mx;
            $y += $my;
        }

        return $trees;
    }

    public function partTwo(Input $input): int
    {
        $map = $input->lines();

        return $this->countTrees($map, 1, 1) *
            $this->countTrees($map, 3, 1) *
            $this->countTrees($map, 5, 1) *
            $this->countTrees($map, 7, 1) *
            $this->countTrees($map, 1, 2);
    }
}
