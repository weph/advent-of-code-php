<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use RuntimeException;

/**
 * @psalm-immutable
 */
final readonly class CharacterCount
{
    /**
     * @param non-empty-array<string, int> $counts
     */
    private function __construct(private array $counts)
    {
    }

    /**
     * @psalm-pure
     */
    public static function fromString(string $value): self
    {
        $counts = [];
        foreach (count_chars($value, 1) as $ord => $count) {
            $counts[chr($ord)] = $count;
        }

        if ($counts === []) {
            throw new RuntimeException('String is empty');
        }

        return new self($counts);
    }

    public function mostCommon(): string
    {
        return (string)array_search(max($this->counts), $this->counts);
    }

    public function leastCommon(): string
    {
        return (string)array_search(min($this->counts), $this->counts);
    }

    public function hasCharacterWithCount(int $count): bool
    {
        return in_array($count, $this->counts);
    }
}
