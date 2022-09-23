<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day08;

final class Screen
{
    /**
     * @var array<int, array<int, bool>>
     */
    private array $pixels;

    public function __construct(private readonly int $cols, private readonly int $rows)
    {
        $this->pixels = array_fill(0, $this->rows, array_fill(0, $this->cols, false));
    }

    public function rect(int $width, int $height): void
    {
        for ($row = 0; $row < $height; $row++) {
            for ($col = 0; $col < $width; $col++) {
                $this->pixels[$row][$col] = true;
            }
        }
    }

    public function rotateColumn(int $column, int $amount): void
    {
        $values = [];
        foreach ($this->pixels as $row) {
            $values[] = $row[$column];
        }

        foreach ($values as $row => $value) {
            $this->pixels[($row + $amount) % $this->rows][$column] = $value;
        }
    }

    public function rotateRow(int $row, int $amount): void
    {
        foreach ($this->pixels[$row] as $col => $value) {
            $this->pixels[$row][($col + $amount) % $this->cols] = $value;
        }
    }

    public function asString(): string
    {
        $result = '';

        for ($row = 0; $row < $this->rows; $row++) {
            for ($col = 0; $col < $this->cols; $col++) {
                $result .= $this->pixels[$row][$col] ? '#' : ' ';
            }
            $result .= "\n";
        }

        return $result;
    }

    public function litPixels(): int
    {
        return count(array_filter(array_merge(...$this->pixels)));
    }
}
