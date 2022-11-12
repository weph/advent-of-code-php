<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day21;

use AdventOfCode\Common\Collection;
use AdventOfCode\Common\Combinations;
use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use Generator;
use RuntimeException;

final class Item
{
    public function __construct(public readonly int $cost, public readonly int $damage, public readonly int $armor)
    {
    }
}

final class Player
{
    public function __construct(public readonly int $hitPoints, public readonly int $damage, public readonly int $armor)
    {
    }

    public function numberOfRoundsToWinAgainst(Player $otherPlayer): int
    {
        return (int)ceil($otherPlayer->hitPoints / max($this->damage - $otherPlayer->armor, 1));
    }
}

/**
 * @return Generator<list<Item>>
 */
function weaponCombinations(): Generator
{
    $weapons = [
        'Dagger' => new Item(8, 4, 0),
        'Shortsword' => new Item(10, 5, 0),
        'Warhammer' => new Item(25, 6, 0),
        'Longsword' => new Item(40, 7, 0),
        'Greataxe' => new Item(74, 8, 0),
    ];

    yield from Combinations::of($weapons, 1);
}

/**
 * @return Generator<list<Item>>
 */
function armorCombinations(): Generator
{
    $armor = [
        'Leather' => new Item(13, 0, 1),
        'Chainmail' => new Item(31, 0, 2),
        'Splintmail' => new Item(53, 0, 3),
        'Bandedmail' => new Item(75, 0, 4),
        'Platemail' => new Item(102, 0, 5),
    ];

    yield [];
    yield from Combinations::of($armor, 1);
}

/**
 * @return Generator<list<Item>>
 */
function ringCombinations(): Generator
{
    $rings = [
        'Damage + 1' => new Item(25, 1, 0),
        'Damage + 2' => new Item(50, 2, 0),
        'Damage + 3' => new Item(100, 3, 0),
        'Defense + 1' => new Item(20, 0, 1),
        'Defense + 2' => new Item(40, 0, 2),
        'Defense + 3' => new Item(80, 0, 3),
    ];

    yield [];
    yield from Combinations::of($rings, 1);
    yield from Combinations::of($rings, 2);
}

/**
 * @return Generator<list<Item>>
 */
function itemCombinations(): Generator
{
    foreach (weaponCombinations() as $weaponCombination) {
        yield $weaponCombination;

        foreach (armorCombinations() as $armorCombination) {
            yield [...$weaponCombination, ...$armorCombination];

            foreach (ringCombinations() as $ringCombination) {
                yield [...$weaponCombination, ...$armorCombination, ...$ringCombination];
            }
        }
    }
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        return $this->playAllCombinations($input)
            ->filter(static fn(array $a) => $a['winner'] === 'player')
            ->sort(static fn(array $a, array $b) => $a['gold'] <=> $b['gold'])
            ->first()['gold'];
    }

    public function partTwo(Input $input): int
    {
        return $this->playAllCombinations($input)
            ->filter(static fn(array $a) => $a['winner'] === 'boss')
            ->sort(static fn(array $a, array $b) => $a['gold'] <=> $b['gold'])
            ->last()['gold'];
    }

    /**
     * @return Collection<array{gold: int, winner: 'player'|'boss'}>
     */
    private function playAllCombinations(Input $input): Collection
    {
        if (preg_match('/Hit Points: (\d+)\nDamage: (\d+)\nArmor: (\d+)/m', $input->raw(), $matches) !== 1) {
            throw new RuntimeException('Invalid input');
        }

        $boss = new Player((int)$matches[1], (int)$matches[2], (int)$matches[3]);

        $results = [];

        foreach (itemCombinations() as $items) {
            $damage = 0;
            $armor = 0;
            $gold = 0;
            foreach ($items as $item) {
                $gold += $item->cost;
                $damage += $item->damage;
                $armor += $item->armor;
            }

            $player = new Player(100, $damage, $armor);

            $results[] = [
                'gold' => $gold,
                'winner' => $player->numberOfRoundsToWinAgainst($boss) < $boss->numberOfRoundsToWinAgainst($player) + 1
                    ? 'player'
                    : 'boss'
            ];
        }

        return new Collection($results);
    }
}
