<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day06;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day06\Solver
 */
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = [
        'abc',
        '',
        'a',
        'b',
        'c',
        '',
        'ab',
        'ac',
        '',
        'a',
        'a',
        'a',
        'a',
        '',
        'b'
    ];

    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(11, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(6, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
