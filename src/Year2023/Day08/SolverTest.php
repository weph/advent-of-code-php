<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day08;

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
            2,
            $this->subject->partOne(Input::fromArray([
                'RL',
                '',
                'AAA = (BBB, CCC)',
                'BBB = (DDD, EEE)',
                'CCC = (ZZZ, GGG)',
                'DDD = (DDD, DDD)',
                'EEE = (EEE, EEE)',
                'GGG = (GGG, GGG)',
                'ZZZ = (ZZZ, ZZZ)',
            ]))
        );
    }

    #[Test]
    public function partOneB(): void
    {
        self::assertSame(
            6,
            $this->subject->partOne(Input::fromArray([
                'LLR',
                '',
                'AAA = (BBB, BBB)',
                'BBB = (AAA, ZZZ)',
                'ZZZ = (ZZZ, ZZZ)',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            6,
            $this->subject->partTwo(Input::fromArray([
                'LR',
                '',
                '11A = (11B, XXX)',
                '11B = (XXX, 11Z)',
                '11Z = (11B, XXX)',
                '22A = (22B, XXX)',
                '22B = (22C, 22C)',
                '22C = (22Z, 22Z)',
                '22Z = (22B, 22B)',
                'XXX = (XXX, XXX)',
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
