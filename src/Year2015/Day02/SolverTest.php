<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('partOneExamples')]
    #[Test]
    public function partOne(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<int, array{0: string, 1: int}>
     */
    public static function partOneExamples(): iterable
    {
        yield ['2x3x4', 58];
        yield ['1x1x10', 43];
        yield ["2x3x4\n1x1x10", 101];
    }

    #[DataProvider('partTwoExamples')]
    #[Test]
    public function partTwo(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromString($input)));
    }

    /**
     * @return iterable<int, array{0: string, 1: int}>
     */
    public static function partTwoExamples(): iterable
    {
        yield ['2x3x4', 34];
        yield ['1x1x10', 14];
        yield ["2x3x4\n1x1x10", 48];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
