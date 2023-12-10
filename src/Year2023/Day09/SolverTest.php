<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day09;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            114,
            $this->subject->partOne(Input::fromArray([
                '0 3 6 9 12 15',
                '1 3 6 10 15 21',
                '10 13 16 21 30 45',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            2,
            $this->subject->partTwo(Input::fromArray([
                '0 3 6 9 12 15',
                '1 3 6 10 15 21',
                '10 13 16 21 30 45',
            ]))
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
