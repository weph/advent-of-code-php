<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day06;

/**
 * @psalm-immutable
 */
final readonly class Swarm
{
    /**
     * @param array<int, int> $population
     */
    public function __construct(private array $population)
    {
    }

    /**
     * @param list<int> $swarm
     */
    public static function fromList(array $swarm): self
    {
        $population = array_fill(0, 9, 0);
        foreach ($swarm as $number) {
            ++$population[$number];
        }

        return new self($population);
    }

    public function generation(int $num): self
    {
        $swarm = $this;

        for ($i = 0; $i < $num; $i++) {
            $swarm = $swarm->nextGeneration();
        }

        return $swarm;
    }

    private function nextGeneration(): self
    {
        $next = array_fill(0, 9, 0);

        foreach ($this->population as $time => $count) {
            if (--$time === -1) {
                $next[6] += $count;
                $next[8] += $count;
            } else {
                $next[$time] += $count;
            }
        }

        return new self($next);
    }

    public function size(): int
    {
        return array_sum($this->population);
    }
}
