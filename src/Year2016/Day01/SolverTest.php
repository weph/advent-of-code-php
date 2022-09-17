<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day01\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @testdox      The shortest number of blocks for the instruction $input should be $expected
     * @dataProvider partOneExamples
     */
    public function partOne(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<int, array{0: string, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield ['R2, L3', 5];
        yield ['R2, R2, R2', 2];
        yield ['R5, L5, R5, R3', 12];
        yield ['R100, L50', 150];
    }

    /**
     * @test
     * @testdox      Given $input, the distance to the first location visited twice should be $expected
     * @dataProvider partTwoExamples
     */
    public function partTwo(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromString($input)));
    }

    /**
     * @return iterable<int, array{0: string, 1: int}>
     */
    public function partTwoExamples(): iterable
    {
        yield ['R8, R4, R4, R8', 4];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
