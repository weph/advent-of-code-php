<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day08;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day08\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('numberOfCharactersExamples')]
    #[Test]
    public function numberOfCharacters(string $input, int $expected): void
    {
        self::assertSame($expected, numberOfCharacters($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public static function numberOfCharactersExamples(): iterable
    {
        yield ['""', 0];
        yield ['"abc"', 3];
        yield ['"aaa\"aaa"', 7];
        yield ['"\x27"', 1];
    }

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            12,
            $this->subject->partOne(
                Input::fromArray([
                    '""',
                    '"abc"',
                    '"aaa\"aaa"',
                    '"\x27"',
                ])
            )
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            19,
            $this->subject->partTwo(
                Input::fromArray([
                    '""',
                    '"abc"',
                    '"aaa\"aaa"',
                    '"\x27"',
                ])
            )
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
