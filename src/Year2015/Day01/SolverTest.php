<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day01\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @testdox      The instructions $input should result in floor $expected
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
        yield ['(())', 0];
        yield ['()()', 0];
        yield ['(((', 3];
        yield ['(()(()(', 3];
        yield ['())', -1];
        yield ['))(', -1];
        yield [')))', -3];
        yield [')())())', -3];
    }

    /**
     * @test
     * @testdox      $input causes him to enter the basement at character position $expected.
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
        yield [')', 1];
        yield ['()())', 5];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
