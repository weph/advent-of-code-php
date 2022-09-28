<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2018\Day01\Solver
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
     * @return iterable<int, array{0: list<int>, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield [[1, -2, 3, 1], 3];
        yield [[1, 1, 1], 3];
        yield [[-1, -2, -3], -6];
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
     * @return iterable<int, array{0: list<int>, 1: int}>
     */
    public function partTwoExamples(): iterable
    {
        yield [[1, -2, 3, 1], 2];
        yield [[1, -1], 0];
        yield [[3, 3, 4, -2, -4], 10];
        yield [[-6, 3, 8, 5, -6], 5];
        yield [[7, 7, -2, -7, -4], 14];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
