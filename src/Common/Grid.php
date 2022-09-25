<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

final class Grid
{
    /**
     * @var array<int, mixed>
     */
    private array $values;

    public function __construct(private readonly int $cols, private readonly int $rows, mixed $initialValue)
    {
        $this->values = array_fill(0, ($this->rows + 1) * $this->cols, $initialValue);
    }

    public function set(Point $point, mixed $value): void
    {
        $this->values[$point->y * $this->cols + $point->x] = $value;
    }

    public function get(Point $point): mixed
    {
        return $this->values[$point->y * $this->cols + $point->x];
    }

    /**
     * @param callable(mixed):mixed $func
     */
    public function process(Point $start, Point $end, callable $func): void
    {
        for ($row = $start->y; $row <= $end->y; $row++) {
            for ($col = $start->x; $col <= $end->x; $col++) {
                $this->set(new Point($col, $row), $func($this->get(new Point($col, $row))));
            }
        }
    }

    /**
     * @return list<mixed>
     */
    public function values(): array
    {
        return array_values($this->values);
    }

    public function asString(): string
    {
        $result = '';

        for ($row = 0; $row < $this->rows; $row++) {
            for ($col = 0; $col < $this->cols; $col++) {
                $result .= (string)$this->get(new Point($col, $row));
            }

            $result .= "\n";
        }

        return $result;
    }
}
