<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day16;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

/**
 * @param array<string, int> $things
 * @param array<string, int> $analysis
 */
function matchesExactly(array $things, array $analysis): bool
{
    return array_diff_assoc($things, $analysis) === [];
}

/**
 * @param array<string, int> $things
 * @param array<string, int> $analysis
 */
function matchesRanges(array $things, array $analysis): bool
{
    foreach ($analysis as $property => $value) {
        if (!array_key_exists($property, $things)) {
            continue;
        }

        if (!match ($property) {
            'cats', 'trees' => $things[$property] > $value,
            'pomeranians', 'goldfish' => $things[$property] < $value,
            default => $things[$property] === $value
        }) {
            return false;
        }
    }

    return true;
}

/**
 * @param array<int, array<string, int>> $sues
 * @param array<string, int> $analysis
 * @param callable(array<string, int>, array<string, int>):bool $comparison
 */
function matchingSue(array $sues, array $analysis, callable $comparison): int
{
    foreach ($sues as $number => $things) {
        if ($comparison($things, $analysis)) {
            return $number;
        }
    }

    throw new RuntimeException('No Sue matches analysis');
}

final class Solver implements PuzzleSolver
{
    private const MFCSAM_ANALYSIS = [
        'children' => 3,
        'cats' => 7,
        'samoyeds' => 2,
        'pomeranians' => 3,
        'akitas' => 0,
        'vizslas' => 0,
        'goldfish' => 5,
        'trees' => 3,
        'cars' => 2,
        'perfumes' => 1,
    ];

    public function partOne(Input $input): int
    {
        return matchingSue($this->thingsYouRemember($input), self::MFCSAM_ANALYSIS, matchesExactly(...));
    }

    public function partTwo(Input $input): int
    {
        return matchingSue($this->thingsYouRemember($input), self::MFCSAM_ANALYSIS, matchesRanges(...));
    }

    /**
     * @return array<int, array<string, int>>
     */
    public function thingsYouRemember(Input $input): array
    {
        $rows = $input->matchLines('/^Sue (\d+): (.+)$/')->asArray();

        $sues = [];
        foreach ($rows as $row) {
            $sues[(int)$row[0]] = [];
            foreach (explode(', ', $row[1]) as $properties) {
                [$property, $value] = explode(': ', $properties);

                $sues[(int)$row[0]][$property] = (int)$value;
            }
        }

        return $sues;
    }
}
