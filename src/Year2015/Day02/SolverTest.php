<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day02;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day02\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider partOneExamples
     */
    public function partOne(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne($input));
    }

    public function partOneExamples(): iterable
    {
        yield ['2x3x4', 58];
        yield ['1x1x10', 43];
        yield ["2x3x4\n1x1x10", 101];
    }

    /**
     * @test
     * @dataProvider partTwoExamples
     */
    public function partTwo(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo($input));
    }

    public function partTwoExamples(): iterable
    {
        yield ['2x3x4', 34];
        yield ['1x1x10', 14];
        yield ["2x3x4\n1x1x10", 48];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
