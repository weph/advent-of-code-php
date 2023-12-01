<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day15;

use AdventOfCode\Common\Compositions;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

/**
 * @psalm-immutable
 */
final readonly class Ingredient
{
    public function __construct(
        private int $capacity,
        private int $durability,
        private int $flavor,
        private int $texture,
        public int $calories
    )
    {
    }

    public function multipliedBy(int $x): self
    {
        return new self(
            $this->capacity * $x,
            $this->durability * $x,
            $this->flavor * $x,
            $this->texture * $x,
            $this->calories * $x
        );
    }

    public function add(self $x): self
    {
        return new self(
            $this->capacity + $x->capacity,
            $this->durability + $x->durability,
            $this->flavor + $x->flavor,
            $this->texture + $x->texture,
            $this->calories + $x->calories
        );
    }

    public function score(): int
    {
        return max(0, $this->capacity) * max(0, $this->durability) * max(0, $this->flavor) * max(0, $this->texture);
    }
}

/**
 * @param list<Ingredient> $ingredients
 * @return array<string, Ingredient>
 */
function possibleRecipes(array $ingredients): array
{
    $scores = [];

    foreach (Compositions::of(100, count($ingredients)) as $composition) {
        $score = new Ingredient(0, 0, 0, 0, 0);

        foreach ($composition as $index => $teaspoons) {
            $score = $score->add($ingredients[$index]->multipliedBy($teaspoons));
        }

        $scores[implode('-', $composition)] = $score;
    }

    return $scores;
}

/**
 * @param array<Ingredient> $x
 */
function maxScore(array $x): int
{
    if ($x === []) {
        return 0;
    }

    return max(array_map(static fn(Ingredient $x) => $x->score(), $x));
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return maxScore(possibleRecipes($this->ingredients($input)));
    }

    public function partTwo(Input $input): int
    {
        $ingredients = $this->ingredients($input);

        $score = array_filter(possibleRecipes($ingredients), static fn(Ingredient $i) => $i->calories === 500);

        return maxScore($score);
    }

    /**
     * @return list<Ingredient>
     */
    public function ingredients(Input $input): array
    {
        return $input->matchLines('/(.+): capacity (-?\d+), durability (-?\d+), flavor (-?\d+), texture (-?\d+), calories (-?\d+)/')
            ->map(static fn(array $d) => new Ingredient((int)$d[1], (int)$d[2], (int)$d[3], (int)$d[4], (int)$d[5]))
            ->asArray();
    }
}
