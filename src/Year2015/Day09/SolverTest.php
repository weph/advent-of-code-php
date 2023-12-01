<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day09;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day09\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            605,
            $this->subject->partOne(
                Input::fromArray([
                    'London to Dublin = 464',
                    'London to Belfast = 518',
                    'Dublin to Belfast = 141',
                ])
            )
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            982,
            $this->subject->partTwo(
                Input::fromArray([
                    'London to Dublin = 464',
                    'London to Belfast = 518',
                    'Dublin to Belfast = 141',
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
