<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day07;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2020\Day07\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            4,
            $this->subject->partOne(Input::fromArray([
                'light red bags contain 1 bright white bag, 2 muted yellow bags.',
                'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
                'bright white bags contain 1 shiny gold bag.',
                'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
                'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
                'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
                'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
                'faded blue bags contain no other bags.',
                'dotted black bags contain no other bags.',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            126,
            $this->subject->partTwo(Input::fromArray([
                'shiny gold bags contain 2 dark red bags.',
                'dark red bags contain 2 dark orange bags.',
                'dark orange bags contain 2 dark yellow bags.',
                'dark yellow bags contain 2 dark green bags.',
                'dark green bags contain 2 dark blue bags.',
                'dark blue bags contain 2 dark violet bags.',
                'dark violet bags contain no other bags.',
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
