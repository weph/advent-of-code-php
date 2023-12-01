<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day12;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day12\Solver::class)]
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
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public static function partOneExamples(): iterable
    {
        yield ['[1,2,3]', 6];
        yield ['{"a":2,"b":4}', 6];
        yield ['{"a":[-1,1]}', 0];
        yield ['[-1,{"a":1}]', 0];
        yield ['[]', 0];
        yield ['{}', 0];
    }

    #[DataProvider('partTwoExamples')]
    #[Test]
    public function partTwo(string $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromString($input)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public static function partTwoExamples(): iterable
    {
        yield ['[1,2,3]', 6];
        yield ['[1,{"c":"red","b":2},3]', 4];
        yield ['{"d":"red","e":[1,2,3,4],"f":5}', 0];
        yield ['[1,"red",5]', 6];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
