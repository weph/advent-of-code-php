<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day19;

use function array_slice;
use function count;
use function strlen;

final class MoleculeGenerator
{
    private array $mapping;

    private array $transformations = [];

    public function __construct(array $mapping)
    {
        $this->mapping = $mapping;
        uasort($this->mapping, static fn(array $a, array $b) => strlen($b[1]) <=> strlen($a[1]));
    }

    public function makeMedicineTwo(string $input, string $expected, int $steps = 0): int
    {
        printf("%s === %s\n\n", $input, $expected);

        if ($input === $expected) {
            return $steps;
        }

        foreach ($this->mapping as $mapping) {
            $i = strpos($input, $mapping[1]);
            if ($i !== false) {
                return $this->makeMedicineTwo(
                    substr($input, 0, $i) . $mapping[0] . substr($input, $i + strlen($mapping[1])),
                    $expected,
                    $steps + 1
                );
            }
        }

        return -1;
    }

    public function makeMedicine(string $input, string $expected, int $steps = 0, array $intersecting = []): int
    {
        printf("%s%s %s\n", str_pad('', $steps, '    '), $input, json_encode($intersecting));

//        $input = substr($input, $offset);
//        $expected = substr($expected, $offset);

        $lastThree = array_slice($intersecting, -2);
//        if (count($lastThree) === 2 && $lastThree[1] < $lastThree[0]) {
//            return -9;
//        }
//
//        if (count($lastThree) === 2 && $lastThree[1] === 0 && $lastThree[0] >= 0) {
//            return -9;
//        }

        if (count($lastThree) === 2 && array_sum($lastThree) === 0) {
//            printf("=> -9\n");

            return -9;
        }

        if ($input === $expected) {
//            printf("=> Got it\n");

            return $steps;
        }

        if (strlen($input) > strlen($expected)) {
//            printf("=> Input longer: %s %s\n", $input, $expected);

            return -1;
        }

        $ranked = [];
        foreach ($this->generate($input) as $permutation) {
            $ranked[$permutation] = self::intersecting($permutation, $expected);
        }

        arsort($ranked);
//        var_dump($ranked);

        foreach ($ranked as $newInput => $r) {
//            printf("%s => %s\n%s => %s\n\n", $newInput, substr($newInput, $r), $expected, substr($expected, $r));
//
//            printf(
//                "%s%s === %s? (%s)\n\n",
//                str_pad('', $steps, '    '),
//                $input,
//                strlen($expected),
//                ''//json_encode($intersecting)
//            );

            $result = $this->makeMedicine(
                substr($newInput, $r),
                substr($expected, $r),
                $steps + 1,
                [...$intersecting, $r]
            );
//            $result = $this->makeMedicine($newInput, $expected, $steps + 1, [...$intersecting, $r]);

            if ($result > 0) {
                return $result;
            }
        }

        return 0;
    }

    public function generate(string $input): array
    {
        $strlen = strlen($input);

        $result = [];

        for ($i = 0; $i < $strlen; $i++) {
            foreach ($this->mapping as $mapping) {
                $sublen = strlen($mapping[0]);

                if (substr($input, $i, $sublen) !== $mapping[0]) {
                    continue;
                }

                if (ctype_lower($input[$i + $sublen] ?? '')) {
                    continue;
                }

                $result[] = substr($input, 0, $i) . $mapping[1] . substr($input, $i + $sublen);
            }
        }

        return $result;
    }

    private static function intersecting(string $a, string $b): int
    {
        $length = min(strlen($a), strlen($b));

        for ($i = 0; $i < $length; $i++) {
            if ($a[$i] !== $b[$i]) {
                return $i;
            }
        }

        return $length;
    }

    private function replacements(string $input, string $from, string $to): array
    {
        $strlen = strlen($input);

        $result = [];

        for ($i = 0; $i < $strlen; $i++) {
            $sublen = strlen($from);

            if (substr($input, $i, $sublen) !== $from) {
                continue;
            }

            $result[] = substr($input, 0, $i) . $to . substr($input, $i + $sublen);
        }

        return $result;
    }
}
