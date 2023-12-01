<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day01;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2020\Day01\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        self::assertSame(
            514579,
            $this->subject->partOne(Input::fromArray([1721, 979, 366, 299, 675, 1456]))
        );
    }

    #[Test]
    public function partTwo(): void
    {
        self::assertSame(
            241_861_950,
            $this->subject->partTwo(Input::fromArray([1721, 979, 366, 299, 675, 1456]))
        );
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
