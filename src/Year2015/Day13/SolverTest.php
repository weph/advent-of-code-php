<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day13;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day13\Solver
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
            330,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        'Alice would gain 54 happiness units by sitting next to Bob.',
                        'Alice would lose 79 happiness units by sitting next to Carol.',
                        'Alice would lose 2 happiness units by sitting next to David.',
                        'Bob would gain 83 happiness units by sitting next to Alice.',
                        'Bob would lose 7 happiness units by sitting next to Carol.',
                        'Bob would lose 63 happiness units by sitting next to David.',
                        'Carol would lose 62 happiness units by sitting next to Alice.',
                        'Carol would gain 60 happiness units by sitting next to Bob.',
                        'Carol would gain 55 happiness units by sitting next to David.',
                        'David would gain 46 happiness units by sitting next to Alice.',
                        'David would lose 7 happiness units by sitting next to Bob.',
                        'David would gain 41 happiness units by sitting next to Carol.',
                    ]
                )
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
