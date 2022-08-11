<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

use AdventOfCode\Common\Puzzle;
use AdventOfCode\Common\SolvedPuzzles;

/** @var list<Puzzle> $puzzles */
$puzzles = iterator_to_array((new SolvedPuzzles())->all(), false);
rsort($puzzles);

foreach ($puzzles as $puzzle) {
    printf(
        "- Day %d: [Puzzle](https://adventofcode.com/%d/day/%d) / [Solution](src/Year%s/Day%02s)\n",
        $puzzle->day,
        $puzzle->year,
        $puzzle->day,
        $puzzle->year,
        $puzzle->day
    );
}