<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day08;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day08\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider numberOfCharactersExamples
     */
    public function numberOfCharacters(string $input, int $expected): void
    {
        self::assertSame($expected, numberOfCharacters($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: int}>
     */
    public function numberOfCharactersExamples(): iterable
    {
        yield ['""', 0];
        yield ['"abc"', 3];
        yield ['"aaa\"aaa"', 7];
        yield ['"\x27"', 1];
    }

    /**
     * @test
     */
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

    /**
     * @test
     */
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
