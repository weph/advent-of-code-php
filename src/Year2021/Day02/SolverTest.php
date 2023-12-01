<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2021\Day02\Solver
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
            150,
            $this->subject->partOne(
                Input::fromArray([
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
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
            900,
            $this->subject->partTwo(
                Input::fromArray([
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
                ])
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
