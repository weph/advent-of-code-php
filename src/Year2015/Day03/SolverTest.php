<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day03;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day03\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @testdox      By following the instructions $input, Santa should deliver packages to $expected houses
     * @dataProvider partOneExamples
     */
    public function partOne(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield ['>', 2];
        yield ['^>v<', 4];
        yield ['^v^v^v^v^v', 2];
    }

    /**
     * @test
     * @testdox      By following the instructions $input, Santa and Robo-Santa should deliver packages to $expected houses
     * @dataProvider partTwoExamples
     */
    public function partTwo(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromString($input)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public function partTwoExamples(): iterable
    {
        yield ['^v', 3];
        yield ['^>v<', 3];
        yield ['^v^v^v^v^v', 11];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
