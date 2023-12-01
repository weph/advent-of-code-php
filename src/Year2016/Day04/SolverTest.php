<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day04;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Year2016\Day04\Solver::class)]
final class SolverTest extends TestCase
{
    private Solver $subject;

    #[Test]
    public function partOne(): void
    {
        $input = Input::fromArray(
            [
                'aaaaa-bbb-z-y-x-123[abxyz]',
                'a-b-c-d-e-f-g-h-987[abcde]',
                'not-a-real-room-404[oarel]',
                'totally-real-room-200[decoy]',
            ]
        );

        self::assertSame(1514, $this->subject->partOne($input));
    }

    #[Test]
    public function partTwo(): void
    {
        $input = Input::fromArray(
            [
                'qzmt-zixmtkozy-ivhz-343[xxxxx]',
                'rsvxltspi-sfnigx-wxsveki-984[sixve]'
            ]
        );

        self::assertSame(984, $this->subject->partTwo($input));
    }

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
