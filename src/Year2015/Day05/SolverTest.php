<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day05;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day05\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @param list<string> $input
     *
     * @test
     * @testdox      Given the strings $input, there should be $expected nice strings
     * @dataProvider partOneExamples
     */
    public function partOne(array $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partOne(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<string>, 1: int}>
     */
    public function partOneExamples(): iterable
    {
        yield [['ugknbfddgicrmopn'], 1];
        yield [['aaa'], 1];
        yield [['jchzalrnumimnmhp'], 0];
        yield [['haegwjzuvuyypxyu'], 0];
        yield [['dvszwmarrgswjxmb'], 0];
        yield [['ugknbfddgicrmopn', 'aaa', 'jchzalrnumimnmhp', 'haegwjzuvuyypxyu', 'dvszwmarrgswjxmb'], 2];
    }

    /**
     * @param list<string> $input
     *
     * @test
     * @testdox      Given the strings $input, there should be $expected nice strings
     * @dataProvider partTwoExamples
     */
    public function partTwo(array $input, int $expected): void
    {
        self::assertSame($expected, $this->subject->partTwo(Input::fromArray($input)));
    }

    /**
     * @return iterable<array-key, array{0: list<string>, 1: int}>
     */
    public function partTwoExamples(): iterable
    {
        yield [['qjhvhtzxzqqjkmpb'], 1];
        yield [['xxyxx'], 1];
        yield [['uurcxstgmygtbstg'], 0];
        yield [['ieodomkazucvgmuy'], 0];
        yield [['qjhvhtzxzqqjkmpb', 'xxyxx', 'uurcxstgmygtbstg', 'ieodomkazucvgmuy'], 2];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
