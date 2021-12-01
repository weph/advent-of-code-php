<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day03;

use RuntimeException;

final class Santa
{
    private int $x = 0;

    private int $y = 0;

    public function move(string $instruction): void
    {
        match ($instruction) {
            '^' => --$this->y,
            'v' => ++$this->y,
            '>' => ++$this->x,
            '<' => --$this->x,
            default => throw new RuntimeException('Invalid instruction ' . $instruction)
        };
    }

    public function location(): string
    {
        return sprintf('%sx%s', $this->x, $this->y);
    }
}
