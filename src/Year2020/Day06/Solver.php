<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day06;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float|string
    {
        return $input->split("\n\n")
            ->map(static fn(Input $i) => count(array_unique(str_split(preg_replace('/\s/', '', $i->raw())))))
            ->sum();
    }

    public function partTwo(Input $input): int|float|string
    {
        return $input->split("\n\n")
            ->map(static function (Input $i) {
                $groupAnswers = array_filter($i->lines()->map(str_split(...))->asArray());
                $allAnswers = array_unique(array_merge(...$groupAnswers));

                return count(array_intersect(...array_merge([$allAnswers], $groupAnswers)));
            })
            ->sum();
    }
}
