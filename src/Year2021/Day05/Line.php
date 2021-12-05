<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day05;

/**
 * @psalm-immutable
 */
final class Line
{
    public function __construct(
        private readonly int $x1,
        private readonly int $y1,
        private readonly int $x2,
        private readonly int $y2
    ) {
    }

    /**
     * @return list<string>
     */
    public function points(): array
    {
        if ($this->isVertical()) {
            /** @psalm-suppress ImpureFunctionCall */
            return array_map(fn(int $x) => sprintf('%dx%d', $x, $this->y1), range($this->x1, $this->x2));
        }

        if ($this->isHorizontal()) {
            /** @psalm-suppress ImpureFunctionCall */
            return array_map(fn(int $y) => sprintf('%dx%d', $this->x1, $y), range($this->y1, $this->y2));
        }

        $m = ($this->y2 - $this->y1) / ($this->x2 - $this->x1);
        $b = $this->y2 - $m * $this->x2;

        return array_map(static fn(int $x) => sprintf('%dx%d', $x, $m * $x + $b), range($this->x1, $this->x2));
    }

    public function isVertical(): bool
    {
        return $this->y1 === $this->y2;
    }

    public function isHorizontal(): bool
    {
        return $this->x1 === $this->x2;
    }
}
