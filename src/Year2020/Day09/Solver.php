<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day09;

use AdventOfCode\Common\Combinations;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

final class Solver implements PuzzleSolver
{
    public function __construct(private readonly int $preambleLength = 25)
    {
    }

    public function partOne(Input $input): int
    {
        $numbers = $input->integers();

        for ($i = 0; $i < count($numbers) - $this->preambleLength; $i++) {
            $value = $numbers[$i + $this->preambleLength];
            $preamble = array_slice($numbers, $i, $this->preambleLength);

            if (!in_array($value, array_map(array_sum(...), iterator_to_array(Combinations::of($preamble, 2))))) {
                return $value;
            }
        }

        throw new RuntimeException('No answer found');
    }

    public function partTwo(Input $input): int
    {
        $value = $this->partOne($input);
        $numbers = $input->integers();

        for ($i = 0; $i < count($numbers); $i++) {
            $items = [$numbers[$i]];

            for ($j = $i + 1; array_sum($items) < $value && $j < count($numbers); $j++) {
                $items[] = $numbers[$j];

                if (array_sum($items) === $value) {
                    return min($items) + max($items);
                }
            }
        }

        throw new RuntimeException('No answer found');
    }
}
