<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day05;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day05\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame('18f47a30', $this->subject->partOne(Input::fromString('abc')));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame('05ace8e3', $this->subject->partTwo(Input::fromString('abc')));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
