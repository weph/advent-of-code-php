<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day19;

use function count;

final class Solver
{
    public function partOne(string $input): int
    {
        [$mappingInput, $start] = explode("\n\n", $input);
        $mapping = [];
        foreach (explode("\n", $mappingInput) as $mappingItem) {
            $mapping[] = explode(' => ', $mappingItem);
        }

        $generator = new MoleculeGenerator($mapping);
        $molecules = array_unique($generator->generate($start));

        return count($molecules);
    }

    public function partTwo(string $input): int
    {
        [$mappingInput, $start] = explode("\n\n", $input);
        $mapping = [];
        foreach (explode("\n", $mappingInput) as $mappingItem) {
            $mapping[] = explode(' => ', $mappingItem);
        }

        $generator = new MoleculeGenerator($mapping);

        return $generator->makeMedicine('e', trim($start));
//        return $generator->makeMedicineTwo(trim($start), 'e');
    }
}
