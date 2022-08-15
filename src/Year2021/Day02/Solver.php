<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

use AdventOfCode\Common\Collection;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $instructions = (new Collection($input->lines()))
            ->map(static fn(string $v) => Instruction::fromString($v));

        $position = 0;
        $depth = 0;

        foreach ($instructions->asArray() as $instruction) {
            match ($instruction->direction) {
                Direction::forward => $position += $instruction->length,
                Direction::down => $depth += $instruction->length,
                Direction::up => $depth -= $instruction->length,
            };
        }

        return $position * $depth;
    }

    public function partTwo(Input $input): int
    {
        $instructions = (new Collection($input->lines()))
            ->map(static fn(string $v) => Instruction::fromString($v));

        $position = 0;
        $depth = 0;
        $aim = 0;

        foreach ($instructions->asArray() as $instruction) {
            switch ($instruction->direction) {
                case Direction::forward:
                    $position += $instruction->length;
                    $depth += $aim * $instruction->length;
                    break;

                case Direction::down:
                    $aim += $instruction->length;
                    break;

                case Direction::up:
                    $aim -= $instruction->length;
                    break;
            }
        }

        return $position * $depth;
    }
}
