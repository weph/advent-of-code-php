<?php
declare(strict_types=1);

namespace AdventOfCode\Year2015\Day19;

use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2015\Day19\MoleculeGenerator
 */
final class MoleculeGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function generate(): void
    {
        $generator = new MoleculeGenerator(
            [
                ['H', 'HO'],
                ['H', 'OH'],
                ['O', 'HH']
            ]
        );

        $result = $generator->generate('HOH');

        self::assertEqualsCanonicalizing(
            [
                'HOOH',
                'HOHO',
                'OHOH',
                'HOOH',
                'HHHH',
            ],
            $result
        );
    }

    /**
     * @test
     */
    public function generateTwo(): void
    {
        $generator = new MoleculeGenerator(
            [
                ['B', 'X'],
                ['Bs', 'Y'],
            ]
        );

        $result = $generator->generate('BsBBs');

        self::assertEqualsCanonicalizing(
            [
                'YBBs',
                'BsXBs',
                'BsBY',
            ],
            $result
        );
    }

    /**
     * @test
     */
    public function phew(): void
    {
        $generator = new MoleculeGenerator(
            [
                ['e', 'H'],
                ['e', 'O'],
                ['H', 'HO'],
                ['H', 'OH'],
                ['O', 'HH'],
            ]
        );

//        self::assertSame(3, $generator->makeMedicine('e', 'HOH'));
//        self::assertSame(6, $generator->makeMedicine('e', 'HOHOHO'));
        self::assertSame(9, $generator->makeMedicine('e', 'ORnPBPMgArCaCaCaSiAl'));
    }

    /**
     * @test
     */
    public function phewToo(): void
    {
        $generator = new MoleculeGenerator(
            [
                ['e', 'H'],
                ['e', 'O'],
                ['H', 'HO'],
                ['H', 'OH'],
                ['O', 'HH'],
            ]
        );

//        self::assertSame(3, $generator->makeMedicine('e', 'HOH'));
        var_dump($generator->generate('e'));
    }
}
