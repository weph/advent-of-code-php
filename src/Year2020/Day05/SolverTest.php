<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day05;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2020\Day05\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('boardingPassStringExamples')]
    #[Test]
    public function boardingPassFromString(string $input, int $seatId): void
    {
        self::assertEquals($seatId, seatId($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public static function boardingPassStringExamples(): iterable
    {
        yield ['BFFFBBFRRR', 567];
        yield ['FFFBBBFRRR', 119];
        yield ['BBFFBBFRLL', 820];
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(820, $this->subject->partOne(Input::fromArray(['BFFFBBFRRR', 'FFFBBBFRRR', 'BBFFBBFRLL'])));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
