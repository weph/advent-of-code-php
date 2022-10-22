<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day04;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2019\Day04\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider meetsPartOneCriteriasExamples
     */
    public function meetsPartOneCriterias(string $input, bool $expected): void
    {
        self::assertSame($expected, meetsPartOneCriterias($input));
    }

    /**
     * @return iterable<string, array{0: string, 1: bool}>
     */
    public function meetsPartOneCriteriasExamples(): iterable
    {
        yield 'double 11, never decreases' => ['111111', true];
        yield 'decreasing pair of digits 50' => ['223450', false];
        yield 'no double' => ['123789', false];
    }

    /**
     * @test
     * @dataProvider meetsPartTwoCriteriasExamples
     */
    public function meetsPartTwoCriterias(string $input, bool $expected): void
    {
        self::assertSame($expected, meetsPartTwoCriterias($input));
    }

    /**
     * @return iterable<string, array{0: string, 1: bool}>
     */
    public function meetsPartTwoCriteriasExamples(): iterable
    {
        yield 'never decrease, exactly two digits long' => ['112233', true];
        yield '44 is part of a larger group of 444' => ['123444', false];
        yield 'still contains double 22' => ['111122', true];
    }

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(1640, $this->subject->partOne(Input::fromString('197487-673251')));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(1126, $this->subject->partTwo(Input::fromString('197487-673251')));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
