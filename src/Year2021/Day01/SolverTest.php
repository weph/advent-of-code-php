<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            7,
            $this->subject->partOne(Input::fromArray([199, 200, 208, 210, 200, 207, 240, 269, 260, 263]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            5,
            $this->subject->partTwo(Input::fromArray([199, 200, 208, 210, 200, 207, 240, 269, 260, 263]))
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
