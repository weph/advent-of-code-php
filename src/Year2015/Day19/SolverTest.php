<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day19;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day19\Solver
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
        yield ["H => HO\nH => OH\nO => HH\n\nHOH", 4];
        yield ["H => HO\nH => OH\nO => HH\n\nHOHOHO", 7];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
