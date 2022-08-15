<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day04;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->bruteforce(trim($input->raw()), '00000');
    }

    public function partTwo(Input $input): int
    {
        return $this->bruteforce(trim($input->raw()), '000000');
    }

    private function bruteforce(string $prefix, string $startsWith): int
    {
        $i = 0;

        while (true) {
            $md5 = md5(sprintf('%s%d', $prefix, $i));

            if (str_starts_with($md5, $startsWith)) {
                return $i;
            }

            ++$i;
        }
    }
}
