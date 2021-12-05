<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day04;

use AdventOfCode\Common\Collection;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->winningBoards($input)->first()->score();
    }

    /**
     * @return Collection<BingoBoard>
     */
    private function winningBoards(Input $input): Collection
    {
        $splitted = $input->split("\n\n");

        $numbers = $splitted
            ->first()
            ->split(',')
            ->map(static fn(Input $x) => $x->asInt())
            ->asArray();

        return $splitted
            ->tail()
            ->map(static fn(Input $board) => BingoBoard::fromString($board->raw(), $numbers))
            ->filter(static fn(BingoBoard $board) => $board->hasBingo())
            ->sort(static fn(BingoBoard $a, BingoBoard $b) => $a->moves() <=> $b->moves());
    }

    public function partTwo(Input $input): int
    {
        return $this->winningBoards($input)->last()->score();
    }
}
