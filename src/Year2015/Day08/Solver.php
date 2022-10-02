<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day08;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/** @psalm-pure */
function numberOfCharacters(string $s): int
{
    return strlen(preg_replace(['/\\\\\\\\/', '/\\\\"/', '/\\\\x[0-9a-f][0-9a-f]/'], 'x', $s)) - 2;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return array_sum(
            $input->lines()
                ->map(static fn(string $s) => strlen($s) - numberOfCharacters($s))
                ->asArray()
        );
    }

    public function partTwo(Input $input): int
    {
        return array_sum(
            $input->lines()
                ->map(static fn(string $s) => strlen(addslashes($s)) + 2 - strlen($s))
                ->asArray()
        );
    }
}
