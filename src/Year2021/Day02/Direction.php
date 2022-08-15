<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day02;

enum Direction: string
{
    case forward = 'forward';
    case down = 'down';
    case up = 'up';
}
