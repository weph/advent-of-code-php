<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day03;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use Closure;
use function count;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->gammaRate($input->lines()) * $this->epsilonRate($input->lines());
    }

    /**
     * @param list<string> $values
     */
    private function gammaRate(array $values): int
    {
        return (int)bindec($this->mostCommon($values));
    }

    /**
     * @param list<string> $values
     */
    private function mostCommon(array $values): string
    {
        $x = count($values) / 2;

        return $this->transformSummedBits($values, static fn(int $v) => (int)($v >= $x));
    }

    /**
     * @param list<string> $values
     * @param callable(int):int $func
     */
    private function transformSummedBits(array $values, callable $func): string
    {
        $bitsums = [];
        foreach ($values as $line) {
            foreach (str_split($line) as $i => $v) {
                $bitsums[$i] = ($bitsums[$i] ?? 0) + (int)$v;
            }
        }

        return implode(array_map($func, $bitsums));
    }

    /**
     * @param list<string> $values
     */
    private function epsilonRate(array $values): int
    {
        return (int)bindec($this->leastCommon($values));
    }

    /**
     * @param list<string> $values
     */
    private function leastCommon(array $values): string
    {
        $x = count($values) / 2;

        return $this->transformSummedBits($values, static fn(int $v) => (int)($v < $x));
    }

    public function partTwo(Input $input): int
    {
        $values = $input->lines();

        return $this->oxygenGeneratorRating($values) * $this->co2ScrubberRating($values);
    }

    /**
     * @param list<string> $values
     */
    private function oxygenGeneratorRating(array $values): int
    {
        return (int)bindec($this->filter($values, Closure::fromCallable([$this, 'mostCommon'])));
    }

    /**
     * @param list<string> $values
     * @param Closure(list<string>):string $match
     */
    private function filter(array $values, Closure $match, int $bit = 0): string
    {
        $common = $match($values);

        $filtered = array_values(array_filter($values, static fn(string $bits) => $bits[$bit] === $common[$bit]));
        if (count($filtered) === 1) {
            return $filtered[0];
        }

        return $this->filter($filtered, $match, $bit + 1);
    }

    /**
     * @param list<string> $values
     */
    private function co2ScrubberRating(array $values): int
    {
        return (int)bindec($this->filter($values, Closure::fromCallable([$this, 'leastCommon'])));
    }
}
