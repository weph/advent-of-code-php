<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

use RuntimeException;

/**
 * @psalm-immutable
 */
final class Instruction
{
    private const PATTERN = '/^(.+) (\d+)$/';

    public function __construct(
        public readonly Direction $direction,
        public readonly int $length
    )
    {
    }

    /**
     * @psalm-pure
     */
    public static function fromString(string $input): self
    {
        if (preg_match(self::PATTERN, $input, $matches) !== 1) {
            throw new RuntimeException(sprintf('Input "%s" does not match pattern "%s"', $input, self::PATTERN));
        }

        return new self(Direction::from($matches[1]), (int)$matches[2]);
    }
}
