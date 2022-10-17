<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day07;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class BagRules
{
    /**
     * @var array<string, array<string, int>>
     */
    private array $bags = [];

    public function bagMustContainQuantityOf(string $bag, int $quantity, string $otherBag): void
    {
        $this->bags[$bag][$otherBag] = $quantity;
    }

    public function numberOfBagsThatContain(string $bag): int
    {
        return count(array_filter($this->bags, fn(string $inner) => $this->isBagIn($bag, $inner), ARRAY_FILTER_USE_KEY));
    }

    public function numberofNestedBags(string $bag): int
    {
        $innerBags = $this->bags[$bag] ?? [];

        return array_sum($innerBags) +
            array_sum(
                array_map(
                    fn(string $inner, int $count) => $count * $this->numberofNestedBags($inner),
                    array_keys($innerBags),
                    $innerBags
                )
            );
    }

    private function isBagIn(string $bag, string $otherBag): bool
    {
        $innerBags = $this->bags[$otherBag] ?? [];

        if (array_key_exists($bag, $innerBags)) {
            return true;
        }

        foreach (array_keys($innerBags) as $innerBag) {
            if ($this->isBagIn($bag, $innerBag)) {
                return true;
            }
        }

        return false;
    }
}

function bagRulesFromInput(Input $input): BagRules
{
    $bagRules = new BagRules();

    foreach ($input->matchLines('/(.*) bags contain (.+)/')->asArray() as $data) {
        $bag = $data[0];

        foreach (array_map('trim', explode(',', $data[1])) as $innerBag) {
            if (preg_match('/(\d) (.*) bags?/', $innerBag, $matches) !== 1) {
                continue;
            }

            $bagRules->bagMustContainQuantityOf($bag, (int)$matches[1], $matches[2]);
        }
    }

    return $bagRules;
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float|string
    {
        return bagRulesFromInput($input)->numberOfBagsThatContain('shiny gold');
    }

    public function partTwo(Input $input): int|float|string
    {
        return bagRulesFromInput($input)->numberofNestedBags('shiny gold');
    }
}
