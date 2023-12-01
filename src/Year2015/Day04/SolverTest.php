<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day04;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day04\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('partOneExamples')]
    #[TestDox('Given the secret $input, the lowest number that generates at least five zeros is $expected')]
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
        yield ['abcdef', 609043];
        yield ['pqrstuv', 1_048_970];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
