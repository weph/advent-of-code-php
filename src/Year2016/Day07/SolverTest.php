<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day07;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day07\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     */
    public function partOne(): void
    {
        $input = Input::fromArray([
            'abba[mnop]qrst',
            'abcd[bddb]xyyx',
            'aaaa[qwer]tyui',
            'ioxxoj[asdfgh]zxcvbn',
        ]);

        self::assertSame(2, $this->subject->partOne($input));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        $input = Input::fromArray([
            'aba[bab]xyz',
            'xyx[xyx]xyx',
            'aaa[kek]eke',
            'zazbz[bzb]cdb',
        ]);

        self::assertSame(3, $this->subject->partTwo($input));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
