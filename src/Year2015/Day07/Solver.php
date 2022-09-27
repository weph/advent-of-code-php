<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day07;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->processInstructions($input, [])['a'];
    }

    public function partTwo(Input $input): int
    {
        return $this->processInstructions($input, ['b' => $this->partOne($input)])['a'];
    }

    /**
     * @param array<string, int> $signals
     *
     * @return array<string, int>
     */
    public function processInstructions(Input $input, array $signals): array
    {
        $instructions = $input->lines()->asArray();
        while (count($instructions) > 0) {
            foreach ($instructions as $index => $instruction) {
                if (preg_match('/^([a-z0-9]+) -> ([a-z])$/', $instruction, $matches) === 1) {
                    $signal = is_numeric($matches[1]) ? $matches[1] : ($signals[$matches[1]] ?? null);

                    if ($signal === null) {
                        continue;
                    }

                    if (!isset($signals[$matches[2]])) {
                        $signals[$matches[2]] = (int)$signal;
                    }
                }

                if (preg_match('/^NOT ([a-z0-9]+) -> (.+)$/', $instruction, $matches) === 1) {
                    $signal = $signals[$matches[1]] ?? null;

                    if ($signal === null) {
                        continue;
                    }

                    $signals[$matches[2]] = ~(int)$signal & 65535;
                }

                if (preg_match('/^([a-z0-9]+) (AND|OR|LSHIFT|RSHIFT) ([a-z0-9]+) -> (.+)$/', $instruction, $matches) === 1) {
                    $signal1 = is_numeric($matches[1]) ? $matches[1] : ($signals[$matches[1]] ?? null);
                    $signal2 = is_numeric($matches[3]) ? $matches[3] : ($signals[$matches[3]] ?? null);

                    if ($signal1 === null || $signal2 === null) {
                        continue;
                    }

                    $signals[$matches[4]] = (int)match ($matches[2]) {
                        'AND' => $signal1 & $signal2,
                        'OR' => $signal1 | $signal2,
                        'LSHIFT' => $signal1 << $signal2,
                        'RSHIFT' => $signal1 >> $signal2,
                    };
                }

                unset($instructions[$index]);
                break;
            }
        }

        return $signals;
    }
}
