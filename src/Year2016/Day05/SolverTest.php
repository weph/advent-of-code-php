<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day05;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day05\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame('18f47a30', $this->subject->partOne(Input::fromString('abc')));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame('05ace8e3', $this->subject->partTwo(Input::fromString('abc')));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
