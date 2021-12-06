<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day06;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2021\Day06\Solver
 */
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = ['3,4,3,1,2'];

    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(5934, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(26984457539, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
