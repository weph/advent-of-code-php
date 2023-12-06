<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day06;

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
    #[TestWith([0, 7, 0])]
    #[TestWith([1, 7, 6])]
    #[TestWith([2, 7, 10])]
    #[TestWith([3, 7, 12])]
    #[TestWith([4, 7, 12])]
    #[TestWith([5, 7, 10])]
    #[TestWith([6, 7, 6])]
    #[TestWith([7, 7, 0])]
    public function distance(int $button, int $time, int $expected): void
    {
        self::assertSame($expected, distance($button, $time));
    }

    #[Test]
    #[TestWith([7, 9, 4])]
    #[TestWith([15, 40, 8])]
    #[TestWith([30, 200, 9])]
    public function combinationsToBeat(int $time, int $distance, int $expected): void
    {
        self::assertSame($expected, combinationsToBeat($time, $distance));
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            288,
            $this->subject->partOne(Input::fromArray([
                'Time:      7  15   30',
                'Distance:  9  40  200',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            71503,
            $this->subject->partTwo(Input::fromArray([
                'Time:      7  15   30',
                'Distance:  9  40  200',
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
