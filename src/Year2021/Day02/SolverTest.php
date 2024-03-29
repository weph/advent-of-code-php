<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            150,
            $this->subject->partOne(
                Input::fromArray([
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
                ])
            )
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            900,
            $this->subject->partTwo(
                Input::fromArray([
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
                ])
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
