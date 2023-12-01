<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day03;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day03\Solver::class)]
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = [
        '00100',
        '11110',
        '10110',
        '10111',
        '10101',
        '01111',
        '00111',
        '11100',
        '10000',
        '11001',
        '00010',
        '01010',
    ];

    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(198, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(230, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
