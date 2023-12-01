<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day07;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day07\Solver::class)]
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = ['16,1,2,0,4,2,7,1,2,14'];

    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(37, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(168, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
