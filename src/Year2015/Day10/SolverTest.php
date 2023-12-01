<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day10;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day10\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('lookAndSayExamples')]
    #[Test]
    public function lookAndSay(string $input, string $expected): void
    {
        self::assertSame($expected, lookAndSay($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: string}>
     */
    public static function lookAndSayExamples(): iterable
    {
        yield ['1', '11'];
        yield ['11', '21'];
        yield ['21', '1211'];
        yield ['1211', '111221'];
        yield ['111221', '312211'];
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(139984, $this->subject->partOne(Input::fromString('21')));
    }

    #[Test]
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
