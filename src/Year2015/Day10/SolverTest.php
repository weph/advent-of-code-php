<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day10;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day10\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider lookAndSayExamples
     */
    public function lookAndSay(string $input, string $expected): void
    {
        self::assertSame($expected, lookAndSay($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: string}>
     */
    public function lookAndSayExamples(): iterable
    {
        yield ['1', '11'];
        yield ['11', '21'];
        yield ['21', '1211'];
        yield ['1211', '111221'];
        yield ['111221', '312211'];
    }

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(139984, $this->subject->partOne(Input::fromString('21')));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(1_982_710, $this->subject->partTwo(Input::fromString('21')));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
