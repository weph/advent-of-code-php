<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;
use function array_slice;

/**
 * @psalm-immutable
 */
final readonly class Input
{
    public function __construct(private string $input)
    {
    }

    /**
     * @psalm-pure
     */
    public static function fromString(string $input): self
    {
        return new self($input);
    }

    /**
     * @param array<scalar> $input
     */
    public static function fromArray(array $input): self
    {
        return new self(implode("\n", $input));
    }

    public static function fromFile(string $filename): self
    {
        return new self(file_get_contents($filename));
    }

    public function asInt(): int
    {
        return (int)$this->input;
    }

    public function raw(): string
    {
        return $this->input;
    }

    /**
     * @return list<string>
     */
    public function chars(): array
    {
        return str_split($this->input);
    }

    /**
     * @return list<int>
     */
    public function integers(): array
    {
        return array_map('\intval', $this->lines()->asArray());
    }

    /**
     * @return Collection<string>
     */
    public function lines(): Collection
    {
        return new Collection(explode("\n", trim($this->input)));
    }

    /**
     * @return Collection<string>
     */
    public function columns(): Collection
    {
        $lines = explode("\n", trim($this->input));
        $lineLength = strlen($lines[0]);
        $columns = array_fill(0, $lineLength, '');

        foreach ($lines as $line) {
            foreach (str_split($line) as $position => $char) {
                $columns[$position] .= $char;
            }
        }

        return new Collection($columns);
    }

    /**
     * @return Collection<array<string>>
     */
    public function matchLines(string $regex): Collection
    {
        $result = [];

        foreach ($this->lines()->asArray() as $index => $line) {
            if (preg_match($regex, $line, $matches) !== 1) {
                throw new RuntimeException(sprintf('Cannot match line %d: %s with pattern %s', $index, $line, $regex));
            }

            $result[] = array_slice($matches, 1);
        }

        return new Collection($result);
    }

    /**
     * @param non-empty-string $separator
     * @return Collection<Input>
     */
    public function split(string $separator): Collection
    {
        return new Collection(array_map([self::class, 'fromString'], explode($separator, $this->input)));
    }
}
