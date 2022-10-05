<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day14;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day14\Solver
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
            1120,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        'Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.',
                        'Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.',
                    ]
                )
            )
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            689,
            $this->subject->partTwo(
                Input::fromArray(
                    [
                        'Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.',
                        'Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.',
                    ]
                )
            )
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver(1000);
    }
}
