<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day02;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day02\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        $input = Input::fromArray(['ULL', 'RRDDD', 'LURDL', 'UUUUD']);

        self::assertSame('1985', $this->subject->partOne($input));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        $input = Input::fromArray(['ULL', 'RRDDD', 'LURDL', 'UUUUD']);

        self::assertSame('5DB3', $this->subject->partTwo($input));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
