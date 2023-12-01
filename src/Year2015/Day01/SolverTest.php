<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('partOneExamples')]
    #[TestDox('The instructions $input should result in floor $expected')]
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
        yield ['(())', 0];
        yield ['()()', 0];
        yield ['(((', 3];
        yield ['(()(()(', 3];
        yield ['())', -1];
        yield ['))(', -1];
        yield [')))', -3];
        yield [')())())', -3];
    }

    #[DataProvider('partTwoExamples')]
    #[TestDox('$input causes him to enter the basement at character position $expected.')]
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
        yield [')', 1];
        yield ['()())', 5];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
