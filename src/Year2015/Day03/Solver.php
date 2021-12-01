<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day03;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int
    {
        $deliveryTeam = DeliveryTeam::withTeamSize(1);
        $deliveryTeam->deliverPackages($input->raw());

        return $deliveryTeam->numberOfDeliveredHouses();
    }

    public function partTwo(Input $input): int
    {
        $deliveryTeam = DeliveryTeam::withTeamSize(2);
        $deliveryTeam->deliverPackages($input->raw());

        return $deliveryTeam->numberOfDeliveredHouses();
    }
}
