<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('partOneExamples')]
    #[TestDox('The shortest number of blocks for the instruction $input should be $expected')]
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
        yield ['R2, L3', 5];
        yield ['R2, R2, R2', 2];
        yield ['R5, L5, R5, R3', 12];
        yield ['R100, L50', 150];
    }

    #[DataProvider('partTwoExamples')]
    #[TestDox('Given $input, the distance to the first location visited twice should be $expected')]
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
        yield ['R8, R4, R4, R8', 4];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
