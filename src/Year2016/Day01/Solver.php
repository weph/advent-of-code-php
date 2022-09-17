<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day01;

use AdventOfCode\Common\CardinalDirection;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\Point;
use AdventOfCode\Common\PuzzleSolver;
use LogicException;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $facing = CardinalDirection::NORTH;
        $position = new Point(0, 0);

        preg_match_all('/(?P<direction>[RL])(?P<distance>\d+)(?:, )?/', $input->raw(), $matches, PREG_SET_ORDER);

        foreach ($matches as $instruction) {
            $distance = (int)$instruction['distance'];

            $facing = match ($instruction['direction']) {
                'R' => $facing->turnRight(),
                'L' => $facing->turnLeft(),
            };

            $position = match ($facing) {
                CardinalDirection::NORTH => $position->addY(-$distance),
                CardinalDirection::EAST => $position->addX($distance),
                CardinalDirection::SOUTH => $position->addY($distance),
                CardinalDirection::WEST => $position->addX(-$distance),
            };
        }

        return abs($position->x) + abs($position->y);
    }

    public function partTwo(Input $input): int
    {
        $locations = [];
        $facing = CardinalDirection::NORTH;
        $position = new Point(0, 0);

        preg_match_all('/(?P<direction>[RL])(?P<distance>\d+)(?:, )?/', $input->raw(), $matches, PREG_SET_ORDER);

        foreach ($matches as $instruction) {
            $distance = (int)$instruction['distance'];

            $facing = match ($instruction['direction']) {
                'R' => $facing->turnRight(),
                'L' => $facing->turnLeft(),
            };

            $nextPosition = match ($facing) {
                CardinalDirection::NORTH => $position->addY(-$distance),
                CardinalDirection::EAST => $position->addX($distance),
                CardinalDirection::SOUTH => $position->addY($distance),
                CardinalDirection::WEST => $position->addX(-$distance),
            };

            $positions = match ($facing) {
                CardinalDirection::EAST, CardinalDirection::WEST => array_map(
                    static fn(int $x) => (new Point($x, $position->y))->asString(),
                    array_slice(range($position->x, $nextPosition->x), 1)
                ),
                CardinalDirection::NORTH, CardinalDirection::SOUTH => array_map(
                    static fn(int $y) => (new Point($position->x, $y))->asString(),
                    array_slice(range($position->y, $nextPosition->y), 1)
                ),
            };

            $intersections = array_values(array_intersect($positions, $locations));
            if ($intersections !== []) {
                $poses = Point::fromString($intersections[0]);
                return abs($poses->x) + abs($poses->y);
            }

            $locations = [...$locations, ...$positions];

            $position = $nextPosition;
        }

        throw new LogicException();
    }
}
