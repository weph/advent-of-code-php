<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2023\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            142,
            $this->subject->partOne(Input::fromArray([
                '1abc2',
                'pqr3stu8vwx',
                'a1b2c3d4e5f',
                'treb7uchet',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            281,
            $this->subject->partTwo(Input::fromArray([
                'two1nine',
                'eightwothree',
                'abcone2threexyz',
                'xtwone3four',
                '4nineeightseven2',
                'zoneight234',
                '7pqrstsixteen'
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
