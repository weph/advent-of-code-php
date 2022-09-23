<?php
declare(strict_types=1);

namespace AdventOfCode\Year2017\Day01;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->matches(trim($input->raw()), 1);
    }

    public function partTwo(Input $input): int
    {
        $string = trim($input->raw());

        return $this->matches($string, (int)(strlen($string) / 2));
    }

    public function matches(string $string, int $offset): int
    {
        $sum = 0;

        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] === $string[($i + $offset) % strlen($string)]) {
                $sum += (int)$string[$i];
            }
        }

        return $sum;
    }
}
