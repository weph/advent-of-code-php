<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

/**
 * @template T
 * @param array<T> $input
 * @return list<T>
 */
function sort(array $input): array
{
    \sort($input);

    return $input;
}
