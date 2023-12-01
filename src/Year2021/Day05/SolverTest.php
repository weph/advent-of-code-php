<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day05;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day05\Solver::class)]
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = [
        '0,9 -> 5,9',
        '8,0 -> 0,8',
        '9,4 -> 3,4',
        '2,2 -> 2,1',
        '7,0 -> 7,4',
        '6,4 -> 2,0',
        '0,9 -> 2,9',
        '3,4 -> 1,4',
        '0,0 -> 8,8',
        '5,5 -> 8,2',
    ];

    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(5, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(12, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
