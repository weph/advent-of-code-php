<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

final class Input
{
    private string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public static function fromString(string $input): self
    {
        return new self($input);
    }

    public static function fromArray(array $input): self
    {
        return new self(implode("\n", $input));
    }

    public static function fromFile(string $filename)
    {
        return new self(file_get_contents($filename));
    }

    public function raw(): string
    {
        return $this->input;
    }

    /**
     * @return list<string>
     */
    public function chars(): array
    {
        return str_split($this->input);
    }

    /**
     * @return list<int>
     */
    public function integers(): array
    {
        return array_map('\intval', $this->lines());
    }

    /**
     * @return list<string>
     */
    public function lines(): array
    {
        return explode("\n", trim($this->input));
    }
}
