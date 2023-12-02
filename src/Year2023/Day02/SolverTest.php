<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day02;

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
            8,
            $this->subject->partOne(Input::fromArray([
                'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green',
                'Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue',
                'Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red',
                'Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red',
                'Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            2286,
            $this->subject->partTwo(Input::fromArray([
                'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green',
                'Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue',
                'Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red',
                'Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red',
                'Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green',
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
