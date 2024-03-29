<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        $input = Input::fromArray(['ULL', 'RRDDD', 'LURDL', 'UUUUD']);

        self::assertSame('1985', $this->subject->partOne($input));
    }

    #[Test]
    public function partTwo(): void
    {
        $input = Input::fromArray(['ULL', 'RRDDD', 'LURDL', 'UUUUD']);

        self::assertSame('5DB3', $this->subject->partTwo($input));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
