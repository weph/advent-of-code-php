<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day01;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day01\Solver
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
            514579,
            $this->subject->partOne(Input::fromArray([1721, 979, 366, 299, 675, 1456]))
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            241861950,
            $this->subject->partTwo(Input::fromArray([1721, 979, 366, 299, 675, 1456]))
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
