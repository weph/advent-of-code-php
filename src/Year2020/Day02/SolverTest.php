<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day02;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day02\Solver
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
            2,
            $this->subject->partOne(Input::fromArray(['1-3 a: abcde', '1-3 b: cdefg', '2-9 c: ccccccccc']))
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            1,
            $this->subject->partTwo(Input::fromArray(['1-3 a: abcde', '1-3 b: cdefg', '2-9 c: ccccccccc']))
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
