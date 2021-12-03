<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;
use function array_slice;

final class Input
{
    public function __construct(private string $input)
    {
    }

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
        return array_map('\intval', $this->lines());
    }

    /**
     * @return list<string>
     */
    public function lines(): array
    {
        return explode("\n", trim($this->input));
    }

    /**
     * @return list<array<string>>
     */
    public function matchLines(string $regex): array
    {
        $result = [];

        foreach ($this->lines() as $index => $line) {
            if (preg_match($regex, $line, $matches) !== 1) {
                throw new RuntimeException(sprintf('Cannot match line %d: %s with pattern %s', $index, $line, $regex));
            }

            $result[] = array_slice($matches, 1);
        }

        return $result;
    }
}
