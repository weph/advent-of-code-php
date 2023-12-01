<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day08;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2020\Day08\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            5,
            $this->subject->partOne(Input::fromArray([
                'nop +0',
                'acc +1',
                'jmp +4',
                'acc +3',
                'jmp -3',
                'acc -99',
                'acc +1',
                'jmp -4',
                'acc +6',
            ]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            8,
            $this->subject->partTwo(Input::fromArray([
                'nop +0',
                'acc +1',
                'jmp +4',
                'acc +3',
                'jmp -3',
                'acc -99',
                'acc +1',
                'jmp -4',
                'acc +6',
            ]))
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
