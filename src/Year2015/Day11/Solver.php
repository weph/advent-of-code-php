<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day11;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

function containsIncreasingStraight(string $password): bool
{
    for ($i = 0; $i < strlen($password) - 2; $i++) {
        $one = ord($password[$i]);

        if (ord($password[$i + 1]) - $one === 1 && ord($password[$i + 2]) - $one === 2) {
            return true;
        }
    }

    return false;
}

function containsAtLeastTwoDifferentNonOverlappingPairs(string $password): bool
{
    $pairs = [];

    for ($i = 0; $i < strlen($password) - 1; $i++) {
        if ($password[$i] === $password[$i + 1]) {
            $pairs[] = $password[$i];
        }
    }

    return count(array_unique($pairs)) >= 2;
}

function containsConfusingCharacters(string $password): bool
{
    return str_contains($password, 'i') ||
        str_contains($password, 'o') ||
        str_contains($password, 'l');
}

function validPassword(string $password): bool
{
    return containsIncreasingStraight($password) &&
        containsAtLeastTwoDifferentNonOverlappingPairs($password) &&
        !containsConfusingCharacters($password);
}

function nextValidPassword(string $password): string
{
    while (true) {
        for ($i = strlen($password) - 1; $i > 0; $i--) {
            if ($password[$i] === 'z') {
                $password[$i] = 'a';
                continue;
            }

            $password[$i] = chr(ord($password[$i]) + 1);

            if (validPassword($password)) {
                return $password;
            }

            continue 2;
        }
    }
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): string
    {
        return nextValidPassword(trim($input->raw()));
    }

    public function partTwo(Input $input): string
    {
        return nextValidPassword(nextValidPassword(trim($input->raw())));
    }
}
