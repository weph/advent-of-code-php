<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day08;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

function steps(string $start, string $instructions, array $map): int
{
    $steps = 0;

    $current = $start;
    while (true) {
        foreach (str_split($instructions) as $instruction) {
            ++$steps;
            $current = match ($instruction) {
                'L' => $map[$current][0],
                'R' => $map[$current][1],
            };

            if (str_ends_with($current, 'Z')) {
                return $steps;
            }
        }
    }
}

/**
 * @param array<int> $input
 */
function lcm(array $input): int
{
    return array_reduce($input, static fn(int $a, int $b) => $a * $b / gmp_gcd($a, $b), 1);
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        [$instructions, $network] = explode("\n\n", $input->raw());

        preg_match_all('/(.{3}) = \((.{3}), (.{3})\)/', $network, $matches, PREG_SET_ORDER);
        foreach ($matches as $item) {
            $map[$item[1]] = [$item[2], $item[3]];
        }

        return steps('AAA', $instructions, $map);
    }

    public function partTwo(Input $input): int|float
    {
        [$instructions, $network] = explode("\n\n", $input->raw());

        preg_match_all('/(.{3}) = \((.{3}), (.{3})\)/', $network, $matches, PREG_SET_ORDER);
        foreach ($matches as $item) {
            $map[$item[1]] = [$item[2], $item[3]];
        }

        $things = [];
        foreach (array_keys($map) as $start) {
            if (str_ends_with($start, 'A')) {
                $things[$start] = steps($start, $instructions, $map);
            }
        }

        return lcm($things);
    }
}
