<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day01;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2021\Day01\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(
            7,
            $this->subject->partOne(implode("\n", [199, 200, 208, 210, 200, 207, 240, 269, 260, 263]))
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            5,
            $this->subject->partTwo(implode("\n", [199, 200, 208, 210, 200, 207, 240, 269, 260, 263]))
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
