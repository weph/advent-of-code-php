<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day04;

use Exception;
use function count;

/**
 * @psalm-immutable
 */
final class BingoBoard
{
    /**
     * @var list<int>
     */
    private array $numbersUntilBingo = [];

    /**
     * @param list<list<int>> $grid
     * @param list<int> $numbersDrawn
     */
    public function __construct(private array $grid, array $numbersDrawn)
    {
        foreach ($numbersDrawn as $number) {
            if (!$this->hasBingo()) {
                $this->numbersUntilBingo[] = $number;
            }
        }
    }

    public function hasBingo(): bool
    {
        return $this->hasAllNumbersInOneRow() || $this->hasAllNumbersInOneColumn();
    }

    private function hasAllNumbersInOneRow(): bool
    {
        foreach ($this->grid as $row) {
            if (array_diff($row, $this->numbersUntilBingo) === []) {
                return true;
            }
        }

        return false;
    }

    private function hasAllNumbersInOneColumn(): bool
    {
        $columns = count($this->grid[0]);
        for ($i = 0; $i < $columns; $i++) {
            if (array_diff(array_column($this->grid, $i), $this->numbersUntilBingo) === []) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param list<int> $numbersDrawn
     *
     * @psalm-pure
     */
    public static function fromString(string $grid, array $numbersDrawn): self
    {
        return new self(
            array_map(
                static fn(string $row) => array_map('\intval', preg_split('/\s+/', trim($row))),
                explode("\n", $grid)
            ),
            $numbersDrawn
        );
    }

    public function moves(): int
    {
        return count($this->numbersUntilBingo);
    }

    public function score(): int
    {
        return (int)array_sum($this->unmarked()) * $this->lastNumber();
    }

    private function unmarked(): array
    {
        return array_diff($this->boardNumbers(), $this->numbersUntilBingo);
    }

    private function boardNumbers(): array
    {
        return array_merge(...$this->grid);
    }

    private function lastNumber(): int
    {
        if ($this->numbersUntilBingo === []) {
            throw new Exception('No numbers have been played');
        }

        return $this->numbersUntilBingo[array_key_last($this->numbersUntilBingo)];
    }
}
