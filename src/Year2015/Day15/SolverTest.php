<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day15;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day15\Solver
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
            62842880,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        'Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8',
                        'Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3',
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
            57600000,
            $this->subject->partTwo(
                Input::fromArray(
                    [
                        'Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8',
                        'Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3',
                    ]
                )
            )
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
