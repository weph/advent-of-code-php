<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

/**
 * @param list<int> $memory
 */
function compute(array $memory, int $noun, int $verb): int
{
    $memory[1] = $noun;
    $memory[2] = $verb;

    for ($i = 0; $i < count($memory); $i += 4) {
        switch ($memory[$i]) {
            case 1:
                $memory[$memory[$i + 3]] = $memory[$memory[$i + 1]] + $memory[$memory[$i + 2]];
                break;
            case 2:
                $memory[$memory[$i + 3]] = $memory[$memory[$i + 1]] * $memory[$memory[$i + 2]];
                break;
            case 99:
                break 2;
        }
    }

    return $memory[0];
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $memory = $input->split(',')
            ->map(static fn(Input $s) => $s->asInt())
            ->asArray();

        return compute($memory, 12, 2);
    }

    public function partTwo(Input $input): int
    {
        $memory = $input->split(',')
            ->map(static fn(Input $s) => $s->asInt())
            ->asArray();

        for ($noun = 0; $noun <= 99; $noun++) {
            for ($verb = 0; $verb <= 99; $verb++) {
                if (compute($memory, $noun, $verb) === 19690720) {
                    return 100 * $noun + $verb;
                }
            }
        }

        throw new RuntimeException('No combination of noun and verb found that produces 19690720');
    }
}
