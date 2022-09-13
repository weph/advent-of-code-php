<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;

final class SolvedPuzzles
{
    /**
     * @return iterable<Puzzle>
     */
    public function all(): iterable
    {
        for ($year = 2015; $year <= date('Y'); ++$year) {
            for ($day = 1; $day <= 25; ++$day) {
                $solver = $this->solverFor($year, $day);
                if ($solver === null) {
                    continue;
                }

                yield new Puzzle($year, $day, $solver);
            }
        }
    }

    public function for(int $year, int $day): Puzzle
    {
        $solver = $this->solverFor($year, $day);
        if ($solver === null) {
            throw new RuntimeException(sprintf('No solver found for puzzle %d-%d', $year, $day));
        }

        return new Puzzle($year, $day, $solver);
    }

    private function solverFor(int $year, int $day): ?PuzzleSolver
    {
        $className = sprintf('AdventOfCode\\Year%s\\Day%02d\\Solver', $year, $day);

        if (!class_exists($className)) {
            return null;
        }

        /** @psalm-suppress MixedMethodCall */
        $solver = new $className;
        if (!$solver instanceof PuzzleSolver) {
            throw new RuntimeException(sprintf('Class %s does not implement %s', $className, PuzzleSolver::class));
        }

        return $solver;
    }
}
