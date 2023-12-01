<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day06;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2021\Day06\Solver::class)]
final class SolverTest extends TestCase
{
    private const EXAMPLE_INPUT = ['3,4,3,1,2'];

    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(5934, $this->subject->partOne(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(26_984_457_539, $this->subject->partTwo(Input::fromArray(self::EXAMPLE_INPUT)));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
