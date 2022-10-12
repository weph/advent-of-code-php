<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day04;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class PasswordValidator
{
    /**
     * @return array<string, pure-Closure(string):bool>
     *
     * @psalm-pure
     */
    private static function fieldValidators(): array
    {
        return [
            'byr' => static fn(string $x) => self::numericRange($x, 1920, 2002),
            'iyr' => static fn(string $x) => self::numericRange($x, 2010, 2020),
            'eyr' => static fn(string $x) => self::numericRange($x, 2020, 2030),
            'hgt' => self::height(...),
            'hcl' => self::isHex(...),
            'ecl' => static fn(string $x) => in_array($x, ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']),
            'pid' => self::isPid(...),
        ];
    }

    /**
     * @param array<string, string> $fields
     *
     * @psalm-pure
     */
    public static function hasRequiredFields(array $fields): bool
    {
        return array_diff(array_keys(self::fieldValidators()), array_keys($fields)) === [];
    }

    /**
     * @param array<string, string> $fields
     *
     * @psalm-pure
     */
    public static function isValid(array $fields): bool
    {
        foreach (self::fieldValidators() as $field => $validator) {
            if (!$validator($fields[$field] ?? '')) {
                return false;
            }
        }

        return true;
    }

    /**
     * @psalm-pure
     */
    private static function numericRange(string $i, int $x, int $y): bool
    {
        return ((int)$i) >= $x && ((int)$i) <= $y;
    }

    /**
     * @psalm-pure
     */
    private static function height(string $i): bool
    {
        if (0 === preg_match('/^(?P<value>\d+)(?P<unit>cm|in)$/', $i, $matches)) {
            return false;
        }

        return match ($matches['unit']) {
            'cm' => self::numericRange($matches['value'], 150, 193),
            'in' => self::numericRange($matches['value'], 59, 76),
            default => false,
        };
    }

    /**
     * @psalm-pure
     */
    private static function isHex(string $i): bool
    {
        return 1 === preg_match('/^#[0-9a-f]{6}$/', $i);
    }

    /**
     * @psalm-pure
     */
    private static function isPid(string $i): bool
    {
        return 1 === preg_match('/^[0-9]{9}$/', $i);
    }
}

/**
 * @return array<string, string>
 *
 * @psalm-pure
 */
function fields(string $passport): array
{
    return array_reduce(
        array_filter(preg_split('/\s/', $passport)),
        /** @param array<string, string> $carry */
        static function (array $carry, string $pair) {
            [$key, $value] = explode(':', $pair);

            return [...$carry, $key => $value];
        },
        []
    );
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $input->split("\n\n")
            ->map(static fn(Input $s) => fields($s->raw()))
            ->filter(fn(array $fields) => PasswordValidator::hasRequiredFields($fields))
            ->count();
    }

    public function partTwo(Input $input): int
    {
        return $input->split("\n\n")
            ->map(static fn(Input $s) => fields($s->raw()))
            ->filter(fn(array $fields) => PasswordValidator::isValid($fields))
            ->count();
    }
}
