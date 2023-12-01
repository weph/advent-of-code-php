<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day08;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day08\Solver
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
            'rect 3x2',
            'rotate column x=1 by 1',
            'rotate row y=0 by 4',
            'rotate column x=1 by 1',
        ]);

        self::assertSame(6, $this->subject->partOne($input));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        $input = Input::fromArray(['rect 3x2']);

        self::assertSame(
            "\n" .
            "###                                               \n" .
            "###                                               \n" .
            "                                                  \n" .
            "                                                  \n" .
            "                                                  \n" .
            "                                                  \n",
            $this->subject->partTwo($input)
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
