<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;

/**
 * @psalm-immutable
 */
final class Point
{
    public function __construct(public readonly int $x, public readonly int $y)
    {
    }

    public static function fromString(string $string): self
    {
        if (preg_match('/^\((-?\d+), (-?\d+)\)$/', $string, $matches) !== 1) {
            throw new RuntimeException(sprintf('"%s" is not a valid representation', $string));
        }

        return new self((int)$matches[1], (int)$matches[2]);
    }

    public function addX(int $x): self
    {
        return new self($this->x + $x, $this->y);
    }

    public function addY(int $y): self
    {
        return new self($this->x, $this->y + $y);
    }

    public function add(self $otherPoint): self
    {
        return new self($this->x + $otherPoint->x, $this->y + $otherPoint->y);
    }

    public function subtract(self $otherPoint): self
    {
        return new self($this->x - $otherPoint->x, $this->y - $otherPoint->y);
    }

    public function asString(): string
    {
        return sprintf('(%d, %d)', $this->x, $this->y);
    }
}
