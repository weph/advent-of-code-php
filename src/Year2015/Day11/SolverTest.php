<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day11;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day11\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider passwordExamples
     */
    public function validPassword(string $input, bool $expected): void
    {
        self::assertSame($expected, validPassword($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: bool}>
     */
    public function passwordExamples(): iterable
    {
        yield ['hijklmmn', false];
        yield ['abbceffg', false];
        yield ['abbcegjk', false];
        yield ['abcdffaa', true];
        yield ['ghjaabcc', true];
    }

    /**
     * @test
     * @dataProvider partOneExamples
     */
    public function partOne(string $input, string $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: string}>
     */
    public function partOneExamples(): iterable
    {
        yield ['abcdefgh', 'abcdffaa'];
        yield ['ghijklmn', 'ghjaabcc'];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
