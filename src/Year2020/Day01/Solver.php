<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day01;

use AdventOfCode\Common\Combinations;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use LogicException;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->productOfCombinationOfNThatSumsUpTo2020($input->integers(), 2);
    }

    public function partTwo(Input $input): int
    {
        return $this->productOfCombinationOfNThatSumsUpTo2020($input->integers(), 3);
    }

    /**
     * @param list<int> $values
     */
    private function productOfCombinationOfNThatSumsUpTo2020(array $values, int $n): int
    {
        foreach (Combinations::of($values, $n) as $combination) {
            if (array_sum($combination) === 2020) {
                return array_product($combination);
            }
        }

        throw new LogicException('There is no combination that sums up to 2020');
    }
}
