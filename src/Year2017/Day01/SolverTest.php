<?php
declare(strict_types=1);

namespace AdventOfCode\Year2017\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2017\Day01\Solver
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
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<int, array{0: string, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield ['1122', 3];
        yield ['1111', 4];
        yield ['1234', 0];
        yield ['91212129', 9];
    }

    /**
     * @test
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
        yield ['1212', 6];
        yield ['1221', 0];
        yield ['123425', 4];
        yield ['123123', 12];
        yield ['12131415', 4];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
