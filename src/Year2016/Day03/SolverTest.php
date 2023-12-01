<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day03;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day03\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        $input = Input::fromArray(
            [
                '    5   10   25',
                '   20   30   15',
                '   15   15   15',
            ]
        );

        self::assertSame(2, $this->subject->partOne($input));
    }

    #[Test]
    public function partTwo(): void
    {
        $input = Input::fromArray(
            [
                '    5   20   15',
                '   10   30   15',
                '   25   15   15',
            ]
        );

        self::assertSame(2, $this->subject->partTwo($input));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
