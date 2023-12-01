<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day08;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day08\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
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

    #[Test]
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
