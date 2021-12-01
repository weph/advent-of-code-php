<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day03;

use function count;

final class DeliveryTeam
{
    /**
     * @var list<Santa>
     */
    private array $team;

    private int $currentMember = 0;

    private array $deliveredHouses = [];

    /**
     * @param list<Santa> $team
     */
    private function __construct(array $team)
    {
        $this->team = $team;
    }

    public static function withTeamSize(int $teamSize): self
    {
        $team = [];
        for ($i = 0; $i < $teamSize; $i++) {
            $team[] = new Santa();
        }

        return new self($team);
    }

    public function deliverPackages(string $instructions): void
    {
        foreach ($this->team as $member) {
            $this->dropPackageAt($member->location());
        }

        foreach (str_split($instructions) as $instruction) {
            $this->currentMemeber()->move($instruction);

            $this->dropPackageAt($this->currentMemeber()->location());

            $this->nextMember();
        }
    }

    private function dropPackageAt(string $location): void
    {
        $this->deliveredHouses[$location] = (int)($this->deliveredHouses[$location] ?? 0) + 1;
    }

    private function currentMemeber(): Santa
    {
        return $this->team[$this->currentMember];
    }

    private function nextMember(): void
    {
        $this->currentMember = ($this->currentMember + 1) % count($this->team);
    }

    public function numberOfDeliveredHouses(): int
    {
        return count($this->deliveredHouses);
    }
}
