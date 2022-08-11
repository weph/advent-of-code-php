<?php
declare(strict_types=1);

namespace AdventOfCode\Year2021\Day08;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2021\Day08\SignalDecoder
 */
final class SignalDecoderTest extends TestCase
{
    private SignalDecoder $subject;

    /**
     * @test
     */
    public function find_possible_digits(): void
    {
        $result = $this->subject->decode(
            ['acedgfb', 'cdfbe', 'gcdfa', 'fbcad', 'dab', 'cefabd', 'cdfgeb', 'eafb', 'cagedb', 'ab'],
            ['cdfeb', 'fcadb', 'cdfeb', 'cdbaf']
        );

        self::assertEquals(5353, $result);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new SignalDecoder();
    }
}
