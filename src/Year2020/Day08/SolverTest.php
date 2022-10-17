<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day08;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day08\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     */
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

    /**
     * @test
     */
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
