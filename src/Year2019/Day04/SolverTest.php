<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day04;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2019\Day04\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('meetsPartOneCriteriasExamples')]
    #[Test]
    public function meetsPartOneCriterias(string $input, bool $expected): void
    {
        self::assertSame($expected, meetsPartOneCriterias($input));
    }

    /**
     * @return iterable<string, array{0: string, 1: bool}>
     */
    public static function meetsPartOneCriteriasExamples(): iterable
    {
        yield 'double 11, never decreases' => ['111111', true];
        yield 'decreasing pair of digits 50' => ['223450', false];
        yield 'no double' => ['123789', false];
    }

    #[DataProvider('meetsPartTwoCriteriasExamples')]
    #[Test]
    public function meetsPartTwoCriterias(string $input, bool $expected): void
    {
        self::assertSame($expected, meetsPartTwoCriterias($input));
    }

    /**
     * @return iterable<string, array{0: string, 1: bool}>
     */
    public static function meetsPartTwoCriteriasExamples(): iterable
    {
        yield 'never decrease, exactly two digits long' => ['112233', true];
        yield '44 is part of a larger group of 444' => ['123444', false];
        yield 'still contains double 22' => ['111122', true];
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(1640, $this->subject->partOne(Input::fromString('197487-673251')));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(1126, $this->subject->partTwo(Input::fromString('197487-673251')));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
