<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day09;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\Permutations;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return min($this->permutateItineraries($input));
    }

    public function partTwo(Input $input): int
    {
        return max($this->permutateItineraries($input));
    }

    /**
     * @return non-empty-array<string, int>
     */
    private function permutateItineraries(Input $input): array
    {
        $distances = $input->matchLines('/(.+?) to (.+?) = (\d+)/')->asArray();
        /** @var list<string> $locations */
        $locations = array_values(array_unique(array_merge(array_column($distances, 0), array_column($distances, 1))));

        $distanceBetween = [];
        foreach ($distances as $distance) {
            $distanceBetween[$distance[0]][$distance[1]] = (int)$distance[2];
            $distanceBetween[$distance[1]][$distance[0]] = (int)$distance[2];
        }

        $result = [];
        foreach (Permutations::of($locations) as $itinerary) {
            $total = 0;

            for ($i = 0; $i < count($itinerary) - 1; $i++) {
                $total += $distanceBetween[$itinerary[$i]][$itinerary[$i + 1]];
            }

            $result[implode(' -> ', $itinerary)] = $total;
        }

        return $result;
    }
}
