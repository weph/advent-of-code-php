<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day03;

use AdventOfCode\Common\Point;
use RuntimeException;

final class Santa
{
    private Point $location;

    public function __construct()
    {
        $this->location = new Point(0, 0);
    }

    public function move(string $instruction): void
    {
        $this->location = match ($instruction) {
            '^' => $this->location->addY(-1),
            'v' => $this->location->addY(1),
            '>' => $this->location->addX(1),
            '<' => $this->location->addX(-1),
            default => throw new RuntimeException('Invalid instruction ' . $instruction)
        };
    }

    public function location(): Point
    {
        return $this->location;
    }
}
