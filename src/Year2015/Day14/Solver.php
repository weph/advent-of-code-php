<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day14;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use Webmozart\Assert\Assert;

/**
 * @psalm-immutable
 */
final class Reindeer
{
    public function __construct(
        public  readonly string $name,
        private readonly int $speed,
        private readonly int $time,
        private readonly int $rest
    )
    {
    }

    public function traveledDistanceAfter(int $seconds): int
    {
        $cycle = $this->time + $this->rest;
        $add = $seconds % $cycle > $this->time ? 1 : ($seconds % $cycle) / $this->time;

        return (int)($this->speed * $this->time * (floor($seconds / $cycle) + $add));
    }
}

interface ScoringSystem
{
    /**
     * @param non-empty-list<non-empty-array<string, int>> $raceData
     */
    public function score(array $raceData): int;
}

final class MaxDistanceScoringSystem implements ScoringSystem
{
    public function score(array $raceData): int
    {
        return max($raceData[array_key_last($raceData)]);
    }
}

final class MaxPointsScoringSystem implements ScoringSystem
{
    public function score(array $raceData): int
    {
        $points = [];

        foreach ($raceData as $distances) {
            $max = max($distances);

            foreach ($distances as $reindeerName => $distance) {
                if ($distance === $max) {
                    $points[$reindeerName] = ($points[$reindeerName] ?? 0) + 1;
                }
            }
        }

        Assert::notEmpty($points);

        return max($points);
    }
}

final class ReindeerOlympics
{
    /**
     * @param non-empty-list<Reindeer> $reindeers
     */
    public function __construct(private readonly array $reindeers)
    {
    }

    public function race(int $seconds, ScoringSystem $scoringSystem): int
    {
        $raceData = [];

        for ($i = 1; $i <= $seconds; $i++) {
            $distances = [];

            foreach ($this->reindeers as $reindeer) {
                $distances[$reindeer->name] = $reindeer->traveledDistanceAfter($i);
            }

            $raceData[] = $distances;
        }

        Assert::notEmpty($raceData);

        return $scoringSystem->score($raceData);
    }
}

final class Solver implements PuzzleSolver
{
    public function __construct(private readonly int $raceDurationInSeconds = 2503)
    {
    }

    public function partOne(Input $input): int
    {
        return $this->reindeerOlympics($input)->race($this->raceDurationInSeconds, new MaxDistanceScoringSystem());
    }

    public function partTwo(Input $input): int
    {
        return $this->reindeerOlympics($input)->race($this->raceDurationInSeconds, new MaxPointsScoringSystem());
    }

    private function reindeerOlympics(Input $input): ReindeerOlympics
    {
        $reindeers = $input->matchLines('/^(?P<name>.+?) can fly (?P<speed>\d+) km\/s for (?P<time>\d+) seconds, but then must rest for (?P<rest>\d+) seconds.$/')
            ->map(static fn(array $data) => new Reindeer($data['name'], (int)$data['speed'], (int)$data['time'], (int)$data['rest']))
            ->asArray();

        Assert::notEmpty($reindeers);

        return new ReindeerOlympics($reindeers);
    }
}
