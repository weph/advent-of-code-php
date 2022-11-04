<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day20;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day20\Solver
 */
final class SolverTest extends TestCase
{
    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(16, (new Solver())->partOne(Input::fromString('300')));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(12, (new Solver())->partTwo(Input::fromString('300')));
    }
}
