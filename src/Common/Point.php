<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;

/**
 * @psalm-immutable
 */
final readonly class Point
{
    public function __construct(public int $x, public int $y)
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

    public function addXY(int $x, int $y): self
    {
        return new self($this->x + $x, $this->y + $y);
    }

    public function asString(): string
    {
        return sprintf('(%d, %d)', $this->x, $this->y);
    }

    public function withX(int $x): self
    {
        return new self($x, $this->y);
    }

    public function withY(int $y): self
    {
        return new self($this->x, $y);
    }
}
