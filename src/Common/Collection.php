<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use Exception;
use function array_slice;
use function count;

/**
 * @template T
 *
 * @psalm-immutable
 */
final class Collection
{
    /**
     * @param list<T> $items
     */
    public function __construct(private readonly array $items)
    {
    }

    /**
     * @return list<T>
     */
    public function asArray(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return T
     * @throws Exception
     */
    public function first(): mixed
    {
        if ($this->items === []) {
            throw new Exception('Collection is empty');
        }

        return $this->items[0];
    }

    /**
     * @return T
     * @throws Exception
     */
    public function last(): mixed
    {
        if ($this->items === []) {
            throw new Exception('Collection is empty');
        }

        return $this->items[array_key_last($this->items)];
    }

    /**
     * @template RT
     * @param pure-Closure(T):RT $func
     * @return self<RT>
     */
    public function map(callable $func): self
    {
        return new self(array_map($func, $this->items));
    }

    /**
     * @param pure-Closure(T):bool $func
     * @return self<T>
     */
    public function filter(callable $func): self
    {
        return new self(array_values(array_filter($this->items, $func)));
    }

    /**
     * @return self<T>
     */
    public function tail(): Collection
    {
        return new self(array_slice($this->items, 1));
    }

    /**
     * @param pure-Closure(T, T):(-1|0|1) $func
     * @return self<T>
     */
    public function sort(callable $func): self
    {
        $sorted = $this->items;

        usort($sorted, $func);

        return new self($sorted);
    }

    public function join(string $separator = ''): string
    {
        /** @psalm-suppress MixedArgumentTypeCoercion */
        return implode($separator, array_map('\strval', $this->items));
    }
}
