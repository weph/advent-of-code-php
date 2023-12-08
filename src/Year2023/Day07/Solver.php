<?php
declare(strict_types=1);

namespace AdventOfCode\Year2023\Day07;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

enum HandType: int
{
    case FiveOfAKind = 7;
    case FourOfAKind = 6;
    case FullHouse = 5;
    case ThreeOfAKind = 4;
    case TwoPair = 3;
    case OnePair = 2;
    case HighCard = 1;

    public static function fromString(string $hand): self
    {
        $chars = count_chars($hand, 1);
        rsort($chars);

        $pattern = implode($chars);

        return match (true) {
            str_starts_with($pattern, '5') => self::FiveOfAKind,
            str_starts_with($pattern, '4') => self::FourOfAKind,
            str_starts_with($pattern, '32') => self::FullHouse,
            str_starts_with($pattern, '3') => self::ThreeOfAKind,
            str_starts_with($pattern, '22') => self::TwoPair,
            str_starts_with($pattern, '2') => self::OnePair,
            default => self::HighCard
        };
    }

    public static function fromStringUsingJokers(string $hand): self
    {
        $type = self::fromString(str_replace('J', '', $hand));

        $jokers = count_chars($hand)[ord('J')];
        for ($i = 0; $i < $jokers; $i++) {
            $type = $type->rankUp();
        }

        return $type;
    }

    private function rankUp(): self
    {
        return match ($this) {
            self::HighCard => self::OnePair,
            self::OnePair => self::ThreeOfAKind,
            self::TwoPair => self::FullHouse,
            self::ThreeOfAKind, self::FullHouse => self::FourOfAKind,
            self::FourOfAKind, self::FiveOfAKind => self::FiveOfAKind,
        };
    }
}

/**
 * @param list<string> $rank
 */
function cardValue(string $card, array $rank): string
{
    return chr(ord('a') + array_search($card, $rank));
}

/**
 * @param list<string> $rank
 */
function handValue(string $hand, array $rank): string
{
    return implode(array_map(static fn(string $s) => cardValue($s, $rank), str_split($hand)));
}

/**
 * @param list<string> $rank
 */
function handByTypeAndValue(array $rank): callable
{
    /**
     * @param array{type: HandType, card: string} $a
     * @param array{type: HandType, card: string} $b
     */
    return static function (array $a, array $b) use ($rank): int {
        $typeSort = $a['type']->value <=> $b['type']->value;

        if ($typeSort === 0) {
            return handValue($a['hand'], $rank) <=> handValue($b['hand'], $rank);
        }

        return $typeSort;
    };
}

function totalWinnings(Input $input, callable $type, array $rank): int
{
    $hands = [];
    foreach ($input->matchLines('/^(.+) (.+)/')->asArray() as $line) {
        $hands[] = [
            'hand' => $line[0],
            'type' => $type($line[0]),
            'bet' => (int)$line[1]
        ];
    }

    usort($hands, handByTypeAndValue($rank));

    return array_sum(
        array_map(
            static fn(int $rank, array $item) => ($rank + 1) * $item['bet'],
            array_keys($hands), $hands
        )
    );
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float
    {
        return totalWinnings(
            $input,
            HandType::fromString(...),
            ['2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K', 'A']
        );
    }

    public function partTwo(Input $input): int|float
    {
        return totalWinnings(
            $input,
            HandType::fromStringUsingJokers(...),
            ['J', '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'Q', 'K', 'A']
        );
    }
}
