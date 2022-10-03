<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day10;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/** @psalm-pure */
function lookAndSay(string $s): string
{
    return preg_replace_callback(
        '/((.)\2*)/',
        static fn(array $matches) => sprintf('%d%d', strlen($matches[1]), $matches[2]),
        $s
    );
}

/** @psalm-pure */
function repeatedLookAndSay(string $s, int $times): string
{
    for ($i = 0; $i < $times; $i++) {
        $s = lookAndSay($s);
    }

    return $s;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return strlen(repeatedLookAndSay(trim($input->raw()), 40));
    }

    public function partTwo(Input $input): int
    {
        return strlen(repeatedLookAndSay(trim($input->raw()), 50));
    }
}
