<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day03;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2018\Day03\Solver
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
            4,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        '#1 @ 1,3: 4x4',
                        '#2 @ 3,1: 4x4',
                        '#3 @ 5,5: 2x2',
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
            3,
            $this->subject->partTwo(
                Input::fromArray(
                    [
                        '#1 @ 1,3: 4x4',
                        '#2 @ 3,1: 4x4',
                        '#3 @ 5,5: 2x2',
                    ]
                )
            )
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
