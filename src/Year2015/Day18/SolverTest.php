<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day18;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day18\Solver
 */
final class SolverTest extends TestCase
{
    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(
            4,
            (new Solver(4))->partOne(
                Input::fromArray(
                    [
                        '.#.#.#',
                        '...##.',
                        '#....#',
                        '..#...',
                        '#.#..#',
                        '####..',
                    ]
                )
            )
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            17,
            (new Solver(5))->partTwo(
                Input::fromArray(
                    [
                        '##.#.#',
                        '...##.',
                        '#....#',
                        '..#...',
                        '#.#..#',
                        '####.#',
                    ]
                )
            )
        );
    }
}
