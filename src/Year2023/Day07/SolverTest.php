<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day07;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

#[CoversClass(Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            6440,
            $this->subject->partOne(Input::fromArray([
                '32T3K 765',
                'T55J5 684',
                'KK677 28',
                'KTJJT 220',
                'QQQJA 483',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            5905,
            $this->subject->partTwo(Input::fromArray([
                '32T3K 765',
                'T55J5 684',
                'KK677 28',
                'KTJJT 220',
                'QQQJA 483',
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
