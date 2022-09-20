<?php
declare(strict_types=1);

namespace AdventOfCode\Year2016\Day05;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): string
    {
        $password = '';

        foreach ($this->md5HashesStartingWithFiveZeros(trim($input->raw())) as $hash) {
            $password .= $hash[5];

            if (strlen($password) === 8) {
                break;
            }
        }

        return $password;
    }

    /**
     * @return iterable<string>
     */
    private function md5HashesStartingWithFiveZeros(string $prefix): iterable
    {
        $i = 0;

        while (true) {
            $md5 = md5(sprintf('%s%d', $prefix, $i));

            if (str_starts_with($md5, '00000')) {
                yield $md5;
            }

            ++$i;
        }
    }

    public function partTwo(Input $input): string
    {
        $password = array_fill(0, 8, ' ');

        foreach ($this->md5HashesStartingWithFiveZeros(trim($input->raw())) as $hash) {
            if (($password[$hash[5]] ?? null) !== ' ') {
                continue;
            }

            $password[$hash[5]] = $hash[6];

            if (!in_array(' ', $password)) {
                break;
            }
        }

        return implode($password);
    }
}
