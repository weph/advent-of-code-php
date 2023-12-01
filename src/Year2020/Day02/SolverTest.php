<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2020\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            2,
            $this->subject->partOne(Input::fromArray(['1-3 a: abcde', '1-3 b: cdefg', '2-9 c: ccccccccc']))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            1,
            $this->subject->partTwo(Input::fromArray(['1-3 a: abcde', '1-3 b: cdefg', '2-9 c: ccccccccc']))
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
