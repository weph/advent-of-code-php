<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day20;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day20\Solver::class)]
final class SolverTest extends TestCase
{
    #[Test]
    public function partOne(): void
    {
        self::assertSame(16, (new Solver())->partOne(Input::fromString('300')));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(12, (new Solver())->partTwo(Input::fromString('300')));
    }
}
