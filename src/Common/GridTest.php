<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Common\Grid
 */
final class GridTest extends TestCase
{
    /**
     * @test
     */
    public function individual_values_can_be_set(): void
    {
        $grid = new Grid(3, 3, ' ');

        $grid->set(new Point(1, 1), 'X');

        self::assertSame(
            "   \n" .
            " X \n" .
            "   \n",
            $grid->asString()
        );
    }

    /**
     * @test
     */
    public function values_can_be_processed_by_a_callback_function(): void
    {
        $grid = new Grid(4, 4, 0);
        $grid->set(new Point(0, 0), 1);
        $grid->set(new Point(1, 1), 2);
        $grid->set(new Point(2, 2), 3);
        $grid->set(new Point(3, 3), 4);

        $grid->process(new Point(1, 1), new Point(2, 2), static fn(int $value) => $value + 1);

        self::assertSame(
            "1000\n" .
            "0310\n" .
            "0140\n" .
            "0004\n",
            $grid->asString()
        );
    }
}
