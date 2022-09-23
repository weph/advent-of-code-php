<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day08;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2016\Day08\Screen
 */
final class ScreenTest extends TestCase
{
    public function test(): void
    {
        $screen = new Screen(7, 3);

        self::assertEquals(
            "       \n" .
            "       \n" .
            "       \n",
            $screen->asString()
        );

        $screen->rect(3, 2);

        self::assertEquals(
            "###    \n" .
            "###    \n" .
            "       \n",
            $screen->asString()
        );

        $screen->rotateColumn(1, 1);

        self::assertEquals(
            "# #    \n" .
            "###    \n" .
            " #     \n",
            $screen->asString()
        );

        $screen->rotateRow(0, 4);

        self::assertEquals(
            "    # #\n" .
            "###    \n" .
            " #     \n",
            $screen->asString()
        );

        $screen->rotateColumn(1, 1);

        self::assertEquals(
            " #  # #\n" .
            "# #    \n" .
            " #     \n",
            $screen->asString()
        );

        self::assertEquals(6, $screen->litPixels());
    }
}
