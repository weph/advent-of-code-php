<?php
declare(strict_types=1);

namespace AdventOfCode\Year2018\Day02;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2018\Day02\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
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

    #[Test]
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

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
