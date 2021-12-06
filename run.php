<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

use AdventOfCode\Common\Input;
use AdventOfCode\Common\InputLoader;
use AdventOfCode\Common\SolvedPuzzles;
use GuzzleHttp\Psr7\HttpFactory;

$inputLoader = new InputLoader(new GuzzleHttp\Client(), new HttpFactory(), file_get_contents('SESSION_TOKEN'));
$solvedPuzzles = new SolvedPuzzles();

foreach ($solvedPuzzles->all() as $puzzle) {
    $inputFile = sprintf('%s/input/%d-%02d.txt', __DIR__, $puzzle->year, $puzzle->day);
    if (!file_exists($inputFile)) {
        file_put_contents($inputFile, $inputLoader->load($puzzle->year, $puzzle->day));
    }

    $input = Input::fromFile($inputFile);

    printf("# %d-%02d\n", $puzzle->year, $puzzle->day);
    printf("Part One: %s\n", $puzzle->solver->partOne($input));
    printf("Part Two: %s\n\n", $puzzle->solver->partTwo($input));
}
