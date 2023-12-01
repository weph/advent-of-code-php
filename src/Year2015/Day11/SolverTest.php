<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day11;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2015\Day11\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[DataProvider('passwordExamples')]
    #[Test]
    public function validPassword(string $input, bool $expected): void
    {
        self::assertSame($expected, validPassword($input));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: bool}>
     */
    public static function passwordExamples(): iterable
    {
        yield ['hijklmmn', false];
        yield ['abbceffg', false];
        yield ['abbcegjk', false];
        yield ['abcdffaa', true];
        yield ['ghjaabcc', true];
    }

    #[DataProvider('partOneExamples')]
    #[Test]
    public function partOne(string $input, string $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromString($input)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: string}>
     */
    public static function partOneExamples(): iterable
    {
        yield ['abcdefgh', 'abcdffaa'];
        yield ['ghijklmn', 'ghjaabcc'];
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
