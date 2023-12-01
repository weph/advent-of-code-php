<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day08;

use AdventOfCode\Common\Input;
use AdventOfCode\Common\PuzzleSolver;
use Exception;
use RuntimeException;

enum Op: string
{
    case acc = 'acc';
    case jmp = 'jmp';
    case nop = 'nop';
}

/**
 * @psalm-immutable
 */
final readonly class Instruction
{
    public function __construct(public Op $op, public int $arg)
    {
    }

    /**
     * @psalm-pure
     */
    public static function fromString(string $s): self
    {
        if (preg_match('/(acc|jmp|nop) ((?:\+|-)\d+)/', $s, $matches) !== 1) {
            throw new RuntimeException(sprintf('Invalid instruction: %s', $s));
        }

        return new self(Op::from($matches[1]), (int)$matches[2]);
    }

    public function withOp(Op $op): self
    {
        return new self($op, $this->arg);
    }
}

final class Emulation
{
    public int $accumulator = 0;

    private array $executedLines = [];

    /**
     * @param array<int, Instruction> $instructions
     */
    public function run(array $instructions): void
    {
        $end = count($instructions);

        $line = 0;
        while ($line < $end) {
            if (in_array($line, $this->executedLines)) {
                throw new RuntimeException('Infinite loop detected');
            }

            $this->executedLines[] = $line;

            $current = $instructions[$line];

            [$line, $this->accumulator] = match ($current->op) {
                Op::acc => [$line + 1, $this->accumulator + $current->arg],
                Op::jmp => [$line + $current->arg, $this->accumulator],
                Op::nop => [$line + 1, $this->accumulator]
            };
        }
    }
}

final class Solver implements PuzzleSolver
{
    public function partOne(Input $input): int|float|string
    {
        $emulation = new Emulation();

        try {
            $emulation->run($this->instructionsFromInput($input));
        } catch (Exception) {
        }

        return $emulation->accumulator;
    }

    public function partTwo(Input $input): int|float|string
    {
        $instructions = $this->instructionsFromInput($input);

        $toFix = array_filter($instructions, static fn(Instruction $i) => in_array($i->op, [Op::jmp, Op::nop]));
        foreach ($toFix as $line => $instruction) {
            $copy = [...$instructions, $line => $instruction->withOp($instruction->op === Op::jmp ? Op::nop : Op::jmp)];

            try {
                $emulation = new Emulation();
                $emulation->run($copy);

                return $emulation->accumulator;
            } catch (Exception) {
            }
        }

        throw new RuntimeException('No answer found');
    }

    /**
     * @return list<Instruction>
     */
    private function instructionsFromInput(Input $input): array
    {
        return $input->lines()->map(Instruction::fromString(...))->asArray();
    }
}
