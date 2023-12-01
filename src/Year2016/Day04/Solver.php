<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day04;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use function array_sum;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return (int)array_sum(
            $input->matchLines('/(.+)-(\d+)\[(.+)\]/')
                ->filter(static function (array $matches) {
                    $counts = count_chars(str_replace('-', '', (string) $matches[0]), 1);
                    arsort($counts);
                    $checksum = implode('', array_map('\chr', array_slice(array_keys($counts), 0, 5)));

                    return $checksum === $matches[2];
                })
                ->map(static fn(array $matches) => $matches[1])
                ->asArray()
        );
    }

    /**
     * @psalm-pure
     */
    private static function rotate(string $s, int $amount): string
    {
        return implode(
            '', array_map(
                static fn(string $c) => chr(((ord($c) - ord('a') + $amount) % 26) + ord('a')),
                str_split($s)
            )
        );
    }

    public function partTwo(Input $input): int
    {
        $locations = $input->matchLines('/(.+)-(\d+)\[(.+)\]/')
            ->filter(static function (array $matches) {
                $name = implode(' ', array_map(static fn(string $s) => self::rotate($s, (int)$matches[1]), explode('-', (string) $matches[0])));

                return $name === 'northpole object storage';
            })
            ->map(static fn(array $matches) => $matches[1])
            ->asArray();

        return (int)$locations[0];
    }
}
