<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day05;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day05\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider boardingPassStringExamples
     */
    public function boardingPassFromString(string $input, int $seatId): void
    {
        self::assertEquals($seatId, seatId($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public function boardingPassStringExamples(): iterable
    {
        yield ['BFFFBBFRRR', 567];
        yield ['FFFBBBFRRR', 119];
        yield ['BBFFBBFRLL', 820];
    }

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(820, $this->subject->partOne(Input::fromArray(['BFFFBBFRRR', 'FFFBBBFRRR', 'BBFFBBFRLL'])));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
