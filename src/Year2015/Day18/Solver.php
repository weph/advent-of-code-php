<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day18;

use AdventOfCode\Common\Grid;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;

final readonly class Solver implements PuzzleSolver
{
    public function __construct(private int $generations = 100)
    {
    }

    public function partOne(Input $input): int
    {
        $grid = $this->initialGrid($input);

        for ($i = 0; $i < $this->generations; $i++) {
            $next = new Grid($grid->cols, $grid->rows, false);

            $grid->each(
                function (Point $p, bool $v) use ($grid, $next) {
                    $active = count(array_filter($grid->valuesAt($p->addXY(-1, -1), $p->addXY(1, 1)))) - ($v ? 1 : 0);

                    $next->set($p, $v ? in_array($active, [2, 3]) : $active === 3);
                }
            );

            $grid = $next;
        }

        return count(array_filter($grid->values()));
    }

    public function partTwo(Input $input): int
    {
        $grid = $this->initialGrid($input);

        for ($i = 0; $i < $this->generations; $i++) {
            $next = new Grid($grid->cols, $grid->rows, false);

            $grid->each(
                function (Point $p, bool $v) use ($grid, $next) {
                    if (in_array($p->x, [0, $grid->cols - 1]) && in_array($p->y, [0, $grid->rows - 1])) {
                        $next->set($p, $grid->valueAt($p));

                        return;
                    }

                    $active = count(array_filter($grid->valuesAt($p->addXY(-1, -1), $p->addXY(1, 1)))) - ($v ? 1 : 0);

                    $next->set($p, $v ? in_array($active, [2, 3]) : $active === 3);
                }
            );

            $grid = $next;
        }

        return count(array_filter($grid->values()));
    }

    public function initialGrid(Input $input): Grid
    {
        $lines = $input->lines()->asArray();

        $rows = count($lines);
        $cols = count(str_split($lines[0]));

        $grid = new Grid($cols, $rows, false);
        foreach ($lines as $y => $line) {
            foreach (str_split(trim($line)) as $x => $light) {
                $grid->set(new Point($x, $y), $light === '#');
            }
        }

        return $grid;
    }
}
