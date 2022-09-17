<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day05;

use AdventOfCode\Common\Point;

/**
 * @psalm-immutable
 */
final class Line
{
    public function __construct(private readonly Point $start, private readonly Point $end)
    {
    }

    /**
     * @return list<Point>
     */
    public function points(): array
    {
        if ($this->isVertical()) {
            /** @psalm-suppress ImpureFunctionCall */
            return array_map(fn(int $x) => new Point($x, $this->start->y), range($this->start->x, $this->end->x));
        }

        if ($this->isHorizontal()) {
            /** @psalm-suppress ImpureFunctionCall */
            return array_map(fn(int $y) => new Point($this->start->x, $y), range($this->start->y, $this->end->y));
        }

        $m = ($this->end->y - $this->start->y) / ($this->end->x - $this->start->x);
        $b = $this->end->y - $m * $this->end->x;

        /** @psalm-suppress ImpureFunctionCall */
        return array_map(static fn(int $x) => new Point($x, (int)($m * $x + $b)), range($this->start->x, $this->end->x));
    }

    public function isVertical(): bool
    {
        return $this->start->y === $this->end->y;
    }

    public function isHorizontal(): bool
    {
        return $this->start->x === $this->end->x;
    }
}
