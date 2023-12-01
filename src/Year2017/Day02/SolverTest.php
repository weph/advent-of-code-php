<?php
declare(strict_types=1);

namespace AdventOfCode\Year2017\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2017\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            18,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        '5 1 9 5',
                        '7 5 3',
                        '2 4 6 8'
                    ]
                )
            )
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            9,
            $this->subject->partTwo(
                Input::fromArray(
                    [
                        '5 9 2 8',
                        '9 4 7 3',
                        '3 8 6 5'
                    ]
                )
            )
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
