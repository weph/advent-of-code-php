<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day02;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2018\Day02\Solver
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
            12,
            $this->subject->partOne(
                Input::fromArray(
                    [
                        'abcdef',
                        'bababc',
                        'abbcde',
                        'abcccd',
                        'aabcdd',
                        'abcdee',
                        'ababab'
                    ]
                )
            )
        );
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(
            'fgij',
            $this->subject->partTwo(
                Input::fromArray(
                    [
                        'abcde',
                        'fghij',
                        'klmno',
                        'pqrst',
                        'fguij',
                        'axcye',
                        'wvxyz'
                    ]
                )
            )
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
