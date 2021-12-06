<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day06;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->initialSwarm($input)
            ->generation(80)
            ->size();
    }

    private function initialSwarm(Input $input): Swarm
    {
        return Swarm::fromList($input->split(',')->map(static fn(Input $v) => $v->asInt())->asArray());
    }

    public function partTwo(Input $input): int
    {
        return $this->initialSwarm($input)
            ->generation(256)
            ->size();
    }
}
