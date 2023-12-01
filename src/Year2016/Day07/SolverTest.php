<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day07;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day07\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
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

    #[Test]
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

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
