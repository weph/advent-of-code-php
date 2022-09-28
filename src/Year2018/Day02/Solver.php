<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day02;

use AdventOfCode\Common\CharacterCount;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use RuntimeException;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $counts = $input->lines()->map(static fn(string $s) => CharacterCount::fromString($s));

        $twoDuplicates = $counts->filter(static fn(CharacterCount $c) => $c->hasCharacterWithCount(2))->count();
        $threeDuplicates = $counts->filter(static fn(CharacterCount $c) => $c->hasCharacterWithCount(3))->count();

        return $twoDuplicates * $threeDuplicates;
    }

    public function partTwo(Input $input): string
    {
        $ids = $input->lines()->asArray();

        for ($i = 0; $i < count($ids); $i++) {
            for ($j = $i + 1; $j < count($ids); $j++) {
                $id1 = $ids[$i];
                $id2 = $ids[$j];

                if (levenshtein($id1, $id2) !== 1) {
                    continue;
                }

                $result = '';
                for ($si = 0; $si < strlen($id1); $si++) {
                    if ($id1[$si] !== $id2[$si]) {
                        continue;
                    }

                    $result .= $id1[$si];
                }

                return $result;
            }
        }

        throw new RuntimeException('No solution found');
    }
}
