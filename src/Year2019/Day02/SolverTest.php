<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2019\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function compute(): void
    {
        self::assertSame(3500, compute([1, 9, 10, 3, 2, 3, 11, 0, 99, 30, 40, 50], 9, 10));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
