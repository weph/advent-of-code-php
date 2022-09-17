<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

enum CardinalDirection
{
    case NORTH;
    case EAST;
    case SOUTH;
    case WEST;

    public function turnRight(): self
    {
        return match ($this) {
            self::NORTH => self::EAST,
            self::EAST => self::SOUTH,
            self::SOUTH => self::WEST,
            self::WEST => self::NORTH
        };
    }

    public function turnLeft(): self
    {
        return match ($this) {
            self::NORTH => self::WEST,
            self::EAST => self::NORTH,
            self::SOUTH => self::EAST,
            self::WEST => self::SOUTH
        };
    }
}
