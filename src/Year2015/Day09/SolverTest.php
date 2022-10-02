<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day09;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day09\Solver
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
            605,
            $this->subject->partOne(
                Input::fromArray([
                    'London to Dublin = 464',
                    'London to Belfast = 518',
                    'Dublin to Belfast = 141',
                ])
            )
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            982,
            $this->subject->partTwo(
                Input::fromArray([
                    'London to Dublin = 464',
                    'London to Belfast = 518',
                    'Dublin to Belfast = 141',
                ])
            )
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
