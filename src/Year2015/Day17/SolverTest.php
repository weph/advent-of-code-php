<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day17;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day17\Solver::class)]
final class SolverTest extends TestCase
{
    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            4,
            (new Solver(25))->partOne(Input::fromArray(['20', '15', '10', '5', '5']))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            3,
            (new Solver(25))->partTwo(Input::fromArray(['20', '15', '10', '5', '5']))
        );
    }
}
