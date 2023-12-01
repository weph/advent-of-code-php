<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day07;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day07\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            123,
            $this->subject->partOne(
                Input::fromArray([
                    'x -> a',
                    '123 -> x',
                    '456 -> y',
                    'x AND y -> d',
                    'x OR y -> e',
                    'x LSHIFT 2 -> f',
                    'y RSHIFT 2 -> g',
                    'NOT x -> h',
                    'NOT y -> i'
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
