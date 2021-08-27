<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use AdventOfCode\Common\InputLoader;
use GuzzleHttp\Psr7\HttpFactory;

$inputLoader = new InputLoader(new GuzzleHttp\Client(), new HttpFactory(), file_get_contents('SESSION_TOKEN'));

class Puzzle
{
    public int $year;

    public int $day;

    public string $solverClass;

    public function __construct(int $year, int $day, string $solverClass)
    {
        $this->year        = $year;
        $this->day         = $day;
        $this->solverClass = $solverClass;
    }

    public function solver(): object
    {
        return new $this->solverClass;
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

            yield new Puzzle($year, $day, $className);
        }
    }
}

foreach (puzzles() as $puzzle) {
    $inputFile = sprintf('%s/input/%d-%02d.txt', __DIR__, $puzzle->year, $puzzle->day);
    if (!file_exists($inputFile)) {
        file_put_contents($inputFile, $inputLoader->load($puzzle->year, $puzzle->day));
    }

    $input = file_get_contents($inputFile);

    $solver = $puzzle->solver();
    printf("# %d-%02d\n", $puzzle->year, $puzzle->day);
    printf("Part One: %s\n", $solver->partOne($input));
    printf("Part Two: %s\n\n", $solver->partTwo($input));
}
