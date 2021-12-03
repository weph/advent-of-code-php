<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

use AdventOfCode\Common\Input;
use AdventOfCode\Common\InputLoader;
use AdventOfCode\Common\PuzzleSolver;
use GuzzleHttp\Psr7\HttpFactory;

$inputLoader = new InputLoader(new GuzzleHttp\Client(), new HttpFactory(), file_get_contents('SESSION_TOKEN'));

final class Puzzle
{
    public function __construct(
        public readonly int $year,
        public readonly int $day,
        public readonly PuzzleSolver $solver
    ) {
    }
}

/**
 * @return iterable<Puzzle>
 */
function puzzles(): iterable
{
    for ($year = 2015; $year <= date('Y'); ++$year) {
        for ($day = 1; $day <= 25; ++$day) {
            $className = sprintf('AdventOfCode\\Year%s\\Day%02d\\Solver', $year, $day);

            if (!class_exists($className)) {
                continue;
            }

            /** @psalm-suppress MixedMethodCall */
            $solver = new $className;
            if (!$solver instanceof PuzzleSolver) {
                throw new RuntimeException(sprintf('Class %s does not implement %s', $className, PuzzleSolver::class));
            }

            yield new Puzzle($year, $day, $solver);
        }
    }
}

foreach (puzzles() as $puzzle) {
    $inputFile = sprintf('%s/input/%d-%02d.txt', __DIR__, $puzzle->year, $puzzle->day);
    if (!file_exists($inputFile)) {
        file_put_contents($inputFile, $inputLoader->load($puzzle->year, $puzzle->day));
    }

    $input = Input::fromFile($inputFile);

    printf("# %d-%02d\n", $puzzle->year, $puzzle->day);
    printf("Part One: %s\n", $puzzle->solver->partOne($input));
    printf("Part Two: %s\n\n", $puzzle->solver->partTwo($input));
}
