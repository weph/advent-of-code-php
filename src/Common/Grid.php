<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

/**
 * @template T
 */
final class Grid
{
    /**
     * @var array<int, T>
     */
    private array $values;

    /**
     * @param T $initialValue
     */
    public function __construct(private readonly int $cols, private readonly int $rows, mixed $initialValue)
    {
        $this->values = array_fill(0, ($this->rows + 1) * $this->cols, $initialValue);
    }

    public function set(Point $point, mixed $value): void
    {
        $this->values[$point->y * $this->cols + $point->x] = $value;
    }

    /**
     * @return T
     */
    public function valueAt(Point $point): mixed
    {
        return $this->values[$point->y * $this->cols + $point->x];
    }

    /**
     * @return list<T>
     */
    public function valuesAt(Point $start, Point $end): array
    {
        $values = [];

        for ($row = $start->y; $row <= $end->y; $row++) {
            for ($col = $start->x; $col <= $end->x; $col++) {
                $values[] = $this->valueAt(new Point($col, $row));
            }
        }

        return $values;
    }

    /**
     * @param callable(T):T $func
     */
    public function process(Point $start, Point $end, callable $func): void
    {
        for ($row = $start->y; $row <= $end->y; $row++) {
            for ($col = $start->x; $col <= $end->x; $col++) {
                $this->set(new Point($col, $row), $func($this->valueAt(new Point($col, $row))));
            }
        }
    }

    /**
     * @return list<T>
     */
    public function values(): array
    {
        return array_values($this->values);
    }

    /**
     * @param null|callable(T):string $func
     */
    public function asString(callable $func = null): string
    {
        $result = '';

        for ($row = 0; $row < $this->rows; $row++) {
            for ($col = 0; $col < $this->cols; $col++) {
                if ($func !== null) {
                    $result .= $func($this->valueAt(new Point($col, $row)));
                } else {
                    $result .= (string)$this->valueAt(new Point($col, $row));
                }
            }

            $result .= "\n";
        }

        return $result;
    }
}
