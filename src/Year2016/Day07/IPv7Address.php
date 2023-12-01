<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day07;

/**
 * @psalm-immutable
 */
final readonly class IPv7Address
{
    /**
     * @param list<string> $supernetSequences
     * @param list<string> $hypernetSequences
     */
    private function __construct(private array $supernetSequences, private array $hypernetSequences)
    {
    }

    /**
     * @psalm-pure
     */
    public static function fromString(string $s): self
    {
        preg_match_all('/([^[]+)(?:\[([^]]+)])?/', $s, $matches);

        return new self(array_values(array_filter($matches[1])), array_values(array_filter($matches[2])));
    }

    public function supportsTLS(): bool
    {
        $abbaSequences = array_filter($this->supernetSequences, static fn(string $s) => self::containsAbba($s));
        if ($abbaSequences === []) {
            return false;
        }

        foreach (array_filter($this->hypernetSequences) as $sequence) {
            if (self::containsAbba($sequence)) {
                return false;
            }
        }

        return true;
    }

    public function supportsSSL(): bool
    {
        $abaSequences = array_map(static fn(string $s) => self::abas($s), $this->supernetSequences);
        if ($abaSequences === []) {
            return false;
        }

        foreach (array_filter($this->hypernetSequences) as $sequence) {
            foreach (array_merge(...$abaSequences) as $aba) {
                if (self::containsBab($sequence, $aba)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @psalm-pure
     */
    private static function containsAbba(string $s): bool
    {
        if (preg_match('/(.)(.)\2\1/', $s, $matches) !== 1) {
            return false;
        }

        return $matches[1] !== $matches[2];
    }

    /**
     * @psalm-pure
     *
     * @return list<string>
     */
    private static function abas(string $s): array
    {
        $result = [];

        for ($i = 0; $i <= strlen($s) - 3; $i++) {
            if ($s[$i] !== $s[$i + 1] && $s[$i] === $s[$i + 2]) {
                $result[] = substr($s, $i, 3);
            }
        }

        return $result;
    }

    /**
     * @psalm-pure
     */
    private static function containsBab(string $s, string $aba): bool
    {
        $bab = sprintf('%s%s%s', $aba[1], $aba[0], $aba[1]);

        return str_contains($s, $bab);
    }
}
