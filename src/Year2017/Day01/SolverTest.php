<?php
declare(strict_types=1);

namespace AdventOfCode\Year2017\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2017\Day01\Solver::class)]
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
        yield ['1122', 3];
        yield ['1111', 4];
        yield ['1234', 0];
        yield ['91212129', 9];
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
