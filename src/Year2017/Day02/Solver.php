<?php
declare(strict_types=1);

namespace AdventOfCode\Year2017\Day02;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return (int)array_sum(
            $input->lines()
                ->map(static function (string $s) {
                    $values = preg_split('/\s+/', $s);

                    return max($values) - min($values);
                })
                ->asArray()
        );
    }

    public function partTwo(Input $input): int
    {
        return (int)array_sum(
            $input->lines()
                ->map(static function (string $s) {
                    $values = preg_split('/\s+/', $s);

                    for ($i = 0; $i < count($values); $i++) {
                        for ($j = $i + 1; $j < count($values); $j++) {
                            if ((int)$values[$i] % (int)$values[$j] === 0) {
                                return (int)$values[$i] / (int)$values[$j];
                            }

                            if ((int)$values[$j] % (int)$values[$i] === 0) {
                                return (int)$values[$j] / (int)$values[$i];
                            }
                        }
                    }

                    return 0;
                })
                ->asArray()
        );
    }
}
