<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day05;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2019\Day05\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @param list<int> $memory
     *
     * @test
     * @dataProvider examples
     */
    public function compute(array $memory, int $input, int $expected): void
    {
        self::assertSame([$expected], (new IntcodeComputer($memory))->run($input));
    }

    /**
     * @return iterable<string, array{0: list<int>, 1: int, 2: int}>
     */
    public function examples(): iterable
    {
        // Using position mode, consider whether the input is equal to 8; output 1 (if it is) or 0 (if it is not)
        $example1 = [3, 9, 8, 9, 10, 9, 4, 9, 99, -1, 8];
        yield 'Example 1, = 8' => [$example1, 8, 1];
        yield 'Example 1, != 8' => [$example1, 9, 0];

        // Using position mode, consider whether the input is less than 8; output 1 (if it is) or 0 (if it is not)
        $example2 = [3, 9, 7, 9, 10, 9, 4, 9, 99, -1, 8];
        yield 'Example 2, < 8' => [$example2, 7, 1];
        yield 'Example 2, = 8' => [$example2, 8, 0];

        // Using immediate mode, consider whether the input is equal to 8; output 1 (if it is) or 0 (if it is not)
        $example3 = [3, 3, 1108, -1, 8, 3, 4, 3, 99];
        yield 'Example 3, = 8' => [$example3, 8, 1];
        yield 'Example 3, != 8' => [$example3, 9, 0];

        // Using immediate mode, consider whether the input is less than 8; output 1 (if it is) or 0 (if it is not)
        $example4 = [3, 3, 1107, -1, 8, 3, 4, 3, 99];
        yield 'Example 4, < 8' => [$example4, 7, 1];
        yield 'Example 4, = 8' => [$example4, 8, 0];

        // Jump test using position mode
        $example5 = [3, 12, 6, 12, 15, 1, 13, 14, 13, 4, 13, 99, -1, 0, 1, 9];
        yield 'Example 5, 0' => [$example5, 0, 0];
        yield 'Example 5, 1' => [$example5, 1, 1];

        // Jump test using immediate mode
        $example6 = [3, 3, 1105, -1, 9, 1101, 0, 0, 12, 4, 12, 99, 1];
        yield 'Example 6, 0' => [$example6, 0, 0];
        yield 'Example 6, 1' => [$example6, 1, 1];

        $example7 = [3, 21, 1008, 21, 8, 20, 1005, 20, 22, 107, 8, 21, 20, 1006, 20, 31,
            1106, 0, 36, 98, 0, 0, 1002, 21, 125, 20, 4, 20, 1105, 1, 46, 104,
            999, 1105, 1, 46, 1101, 1000, 1, 20, 4, 20, 1105, 1, 46, 98, 99];
        yield 'Example 7, 7' => [$example7, 7, 999];
        yield 'Example 7, 8' => [$example7, 8, 1000];
        yield 'Example 7, 9' => [$example7, 9, 1001];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
