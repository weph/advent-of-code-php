<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day01;

use AdventOfCode\Common\Input;
use LogicException;
use function count;

final class Solver
{
    public function partOne(Input $input): int
    {
        $values = $input->integers();
        $numValues = count($values);

        for ($i = 0; $i < $numValues; $i++) {
            for ($j = $i + 1; $j < $numValues; $j++) {
                if ($values[$i] + $values[$j] === 2020) {
                    return $values[$i] * $values[$j];
                }
            }
        }

        throw new LogicException('There are no two numbers that sum up to 2020');
    }

    public function partTwo(Input $input): int
    {
        $values = $input->integers();
        $numValues = count($values);

        for ($i = 0; $i < $numValues; $i++) {
            for ($j = $i + 1; $j < $numValues; $j++) {
                for ($k = $j + 1; $k < $numValues; $k++) {
                    if ($values[$i] + $values[$j] + $values[$k] === 2020) {
                        return $values[$i] * $values[$j] * $values[$k];
                    }
                }
            }
        }

        throw new LogicException('There are no three numbers that sum up to 2020');
    }
}
