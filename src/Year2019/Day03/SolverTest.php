<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day03;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2019\Day03\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @param list<string> $input
     */
    #[DataProvider('partOneExamples')]
    #[Test]
    public function partOne(array $input, int $expected): void
    {
        self::assertEquals($expected, $this->subject->partOne(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<string>, 1: int}>
     */
    public static function partOneExamples(): iterable
    {
        yield [
            [
                'R8,U5,L5,D3',
                'U7,R6,D4,L4',
            ],
            6
        ];

        yield [
            [
                'R75,D30,R83,U83,L12,D49,R71,U7,L72',
                'U62,R66,U55,R34,D71,R55,D58,R83',
            ],
            159
        ];

        yield [
            [
                'R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51',
                'U98,R91,D20,R16,D67,R40,U7,R15,U6,R7',
            ],
            135
        ];
    }

    /**
     * @param list<string> $input
     */
    #[DataProvider('partTwoExamples')]
    #[Test]
    public function partTwo(array $input, int $expected): void
    {
        self::assertEquals($expected, $this->subject->partTwo(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<string>, 1: int}>
     */
    public static function partTwoExamples(): iterable
    {
        yield [
            [
                'R8,U5,L5,D3',
                'U7,R6,D4,L4',
            ],
            30
        ];

        yield [
            [
                'R75,D30,R83,U83,L12,D49,R71,U7,L72',
                'U62,R66,U55,R34,D71,R55,D58,R83',
            ],
            610
        ];

        yield [
            [
                'R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51',
                'U98,R91,D20,R16,D67,R40,U7,R15,U6,R7',
            ],
            410
        ];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
