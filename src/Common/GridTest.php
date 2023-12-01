<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Common\Grid::class)]
final class GridTest extends TestCase
{
    #[Test]
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

    #[Test]
    public function values_can_be_processed_by_a_callback_function(): void
    {
        /** @var Grid<int> $grid */
        $grid = new Grid(4, 4, 0);
        $grid->set(new Point(0, 0), 1);
        $grid->set(new Point(1, 1), 2);
        $grid->set(new Point(2, 2), 3);
        $grid->set(new Point(3, 3), 4);

        $grid->process(new Point(1, 1), new Point(2, 2), static fn(Point $_, int $value) => $value + 1);

        self::assertSame(
            "1000\n" .
            "0310\n" .
            "0140\n" .
            "0004\n",
            $grid->asString()
        );
    }

    #[Test]
    public function individual_range_of_values_can_be_accessed(): void
    {
        $grid = new Grid(4, 4, 0);
        for ($y = 0; $y < 4; $y++) {
            for ($x = 0; $x < 4; $x++) {
                $grid->set(new Point($x, $y), $x + $y * 4 + 1);
            }
        }

        $result = $grid->valuesAt(new Point(1, 1), new Point(2, 2));

        self::assertSame([6, 7, 10, 11], $result);
    }
}
