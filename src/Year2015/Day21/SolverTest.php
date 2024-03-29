<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day21;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day21\Solver::class)]
final class SolverTest extends TestCase
{
    #[Test]
    public function partOne(): void
    {
        self::assertSame(78, (new Solver())->partOne(Input::fromArray(['Hit Points: 104', 'Damage: 8', 'Armor: 1'])));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(148, (new Solver())->partTwo(Input::fromArray(['Hit Points: 104', 'Damage: 8', 'Armor: 1'])));
    }
}
