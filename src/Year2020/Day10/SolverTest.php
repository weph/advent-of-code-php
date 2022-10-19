<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day10;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day10\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @param list<int> $input
     *
     * @test
     * @dataProvider partOneExamples
     */
    public function partOne(array $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<int>, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield [
            [16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4],
            35
        ];

        yield [
            [28, 33, 18, 42, 31, 14, 46, 20, 48, 47, 24, 23, 49, 45, 19, 38, 39, 11, 1, 32, 25, 35, 8, 17, 7, 9, 4, 2, 34, 10, 3],
            220
        ];
    }

    /**
     * @param list<int> $input
     *
     * @test
     * @dataProvider partTwoExamples
     */
    public function partTwo(array $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<int>, 1: int}>
     */
    public function partTwoExamples(): iterable
    {
        yield [
            [16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4],
            8
        ];

        yield [
            [28, 33, 18, 42, 31, 14, 46, 20, 48, 47, 24, 23, 49, 45, 19, 38, 39, 11, 1, 32, 25, 35, 8, 17, 7, 9, 4, 2, 34, 10, 3],
            19208
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
