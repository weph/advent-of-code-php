<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day18;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day18\Solver::class)]
final class SolverTest extends TestCase
{
    #[Test]
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

    #[Test]
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
