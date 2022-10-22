<?php
declare(strict_types=1);

namespace AdventOfCode\Year2019\Day05;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class IntcodeComputer
{
    /**
     * @param array<int, int> $memory
     */
    public function __construct(private array $memory)
    {
    }

    /**
     * @return list<int>
     */
    public function run(int $input): array
    {
        $ip = 0;
        $output = [];
        while ($ip <= count($this->memory)) {
            $opcode = $this->memory[$ip] % 100;
            $p1Mode = (bool)(intval($this->memory[$ip] / 100) % 10);
            $p2Mode = (bool)(intval($this->memory[$ip] / 1000) % 10);

            switch ($opcode) {
                case 1:
                    $this->store($ip + 3, $this->param($ip + 1, $p1Mode) + $this->param($ip + 2, $p2Mode));
                    $ip += 4;
                    break;
                case 2:
                    $this->store($ip + 3, $this->param($ip + 1, $p1Mode) * $this->param($ip + 2, $p2Mode));
                    $ip += 4;
                    break;
                case 3:
                    $this->store($ip + 1, $input);
                    $ip += 2;
                    break;
                case 4:
                    $output[] = $this->param($ip + 1, $p1Mode);
                    $ip += 2;
                    break;
                case 5:
                    $ip = $this->param($ip + 1, $p1Mode) !== 0
                        ? $this->param($ip + 2, $p2Mode)
                        : $ip + 3;
                    break;
                case 6:
                    $ip = $this->param($ip + 1, $p1Mode) === 0
                        ? $this->param($ip + 2, $p2Mode)
                        : $ip + 3;
                    break;
                case 7:
                    $this->store($ip + 3, (int)($this->param($ip + 1, $p1Mode) < $this->param($ip + 2, $p2Mode)));
                    $ip += 4;
                    break;
                case 8:
                    $this->store($ip + 3, (int)($this->param($ip + 1, $p1Mode) === $this->param($ip + 2, $p2Mode)));
                    $ip += 4;
                    break;
                case 99:
                    break 2;
            }
        }

        return $output;
    }

    private function param(int $pointer, bool $immediateMode): int
    {
        return $immediateMode ? $this->memory[$pointer] : $this->memory[$this->memory[$pointer]];
    }

    private function store(int $pointer, int $value): void
    {
        $this->memory[$this->memory[$pointer]] = $value;
    }
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return array_slice($this->intcodeComputer($input)->run(1), -1)[0];
    }

    public function partTwo(Input $input): int
    {
        return array_slice($this->intcodeComputer($input)->run(5), -1)[0];
    }

    private function intcodeComputer(Input $input): IntcodeComputer
    {
        $memory = $input->split(',')
            ->map(static fn(Input $s) => $s->asInt())
            ->asArray();

        return new IntcodeComputer($memory);
    }
}
