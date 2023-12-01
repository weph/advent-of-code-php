<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(\AdventOfCode\Common\Screen::class)]
final class ScreenTest extends TestCase
{
    #[DataProvider('turnOnExamples')]
    #[Test]
    public function it_should_turn_on_leds_within_the_given_points(Point $start, Point $end, string $expected): void
    {
        $screen = new Screen(4, 4);

        $screen->turnOn($start, $end);

        self::assertSame($expected, $screen->asString());
    }

    /**
     * @return iterable<string, array{0: Point, 1: Point, 2: string}>
     */
    public static function turnOnExamples(): iterable
    {
        yield 'line (horizontal)' => [
            new Point(0, 0), new Point(4, 0),
            "####\n" .
            "    \n" .
            "    \n" .
            "    \n",
        ];

        yield 'line (vertical)' => [
            new Point(0, 0), new Point(0, 4),
            "#   \n" .
            "#   \n" .
            "#   \n" .
            "#   \n",
        ];

        yield 'area (top left)' => [
            new Point(0, 0), new Point(1, 1),
            "##  \n" .
            "##  \n" .
            "    \n" .
            "    \n",
        ];

        yield 'area (center)' => [
            new Point(1, 1), new Point(2, 2),
            "    \n" .
            " ## \n" .
            " ## \n" .
            "    \n",
        ];
    }

    public function test(): void
    {
        $screen = new Screen(7, 3);

        self::assertEquals(
            "       \n" .
            "       \n" .
            "       \n",
            $screen->asString()
        );

        $screen->turnOn(new Point(0, 0), new Point(2, 1));

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
