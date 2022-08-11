<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day08;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function in_array;
use function strlen;

final class Solver implements PuzzleSolver
{
    private static array $uniqueSignals = [2, 3, 4, 7];

    public function partOne(Input $input): int
    {
        return $input->matchLines('/.+ \| (.+)/')
            ->map(static fn(array $x) => explode(' ', $x[0]))
            ->reduce(static fn(array $carry, array $x) => array_merge($carry, $x))
            ->filter(static fn(string $x) => in_array(strlen($x), self::$uniqueSignals, true))
            ->count();
    }

    public function partTwo(Input $input): int
    {
        return array_sum(
            $input->matchLines('/(.+) \| (.+)/')
                ->map(static fn(array $x) => SignalDecoder::decode(explode(' ', $x[0]), explode(' ', $x[1])))
                ->asArray()
        );
    }
}
