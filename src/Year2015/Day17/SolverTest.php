<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day17;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day17\Solver
 */
final class SolverTest extends TestCase
{
    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(
            4,
            (new Solver(25))->partOne(Input::fromArray(['20', '15', '10', '5', '5']))
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            3,
            (new Solver(25))->partTwo(Input::fromArray(['20', '15', '10', '5', '5']))
        );
    }
}
