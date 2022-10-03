<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day13;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Permutations;
use AdventOfCode\Common\PuzzleSolver;
use LogicException;

/**
 * @param non-empty-list<string> $attendees
 * @param array<string, array<string, int>> $happinessMap
 * @return non-empty-array<string, int>
 */
function permutateSeatings(array $attendees, array $happinessMap): array
{
    $arrangements = [];

    foreach (Permutations::of($attendees) as $seating) {
        $totalHappiness = 0;

        for ($i = 0; $i < count($seating); $i++) {
            $person = $seating[$i];
            $previousPerson = $seating[$i === 0 ? (int)array_key_last($seating) : $i - 1];
            $nextPerson = $seating[$i === array_key_last($seating) ? 0 : $i + 1];

            $totalHappiness += $happinessMap[$person][$previousPerson] ?? 0;
            $totalHappiness += $happinessMap[$person][$nextPerson] ?? 0;
        }

        $arrangements[implode(' -> ', $seating)] = $totalHappiness;
    }

    return $arrangements;
}

/**
 * @return non-empty-array<string, array<string, int>>
 */
function happinessMap(Input $input): array
{
    $data = $input->matchLines('/^(.+) would (gain|lose) (\d+) .+ to (.+)\.$/')->asArray();

    $happinessMap = [];
    foreach ($data as $item) {
        $happinessMap[$item[0]][$item[3]] = $item['1'] === 'gain' ? (int)$item[2] : -1 * (int)$item[2];
    }

    if ($happinessMap === []) {
        throw new LogicException('No happiness data');
    }

    return $happinessMap;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $happinessMap = happinessMap($input);
        $attendees = array_keys($happinessMap);

        return max(permutateSeatings($attendees, $happinessMap));
    }

    public function partTwo(Input $input): int
    {
        $happinessMap = happinessMap($input);
        $attendees = [...array_keys($happinessMap), 'myself'];

        return max(permutateSeatings($attendees, $happinessMap));
    }
}
