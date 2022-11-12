<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day21;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day21\Solver
 */
final class SolverTest extends TestCase
{
    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(78, (new Solver())->partOne(Input::fromArray(['Hit Points: 104', 'Damage: 8', 'Armor: 1'])));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(148, (new Solver())->partTwo(Input::fromArray(['Hit Points: 104', 'Damage: 8', 'Armor: 1'])));
    }
}
