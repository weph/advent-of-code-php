<?php
declare(strict_types=1);

namespace AdventOfCode\Year2020\Day04;

use AdventOfCode\Common\Input;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Year2020\Day04\Solver
 */
final class SolverTest extends TestCase
{
    private Solver $subject;

    /**
     * @test
     * @dataProvider requiredFieldsExamples
     */
    public function hasRequiredFields(string $fields, bool $expected): void
    {
        self::assertSame($expected, PasswordValidator::hasRequiredFields(fields($fields)));
    }

    /**
     * @return iterable<string, array{0: string, 1: bool}>
     */
    public function requiredFieldsExamples(): iterable
    {
        yield 'all fields present' => [
            'ecl:gry pid:860033327 eyr:2020 hcl:#fffffd byr:1937 iyr:2017 cid:147 hgt:183cm',
            true
        ];

        yield 'field hgt is missing' => [
            'iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884 hcl:#cfa07d byr:1929',
            false
        ];

        yield 'ignore missing cid field' => [
            'hcl:#ae17e1 iyr:2013 eyr:2024 ecl:brn pid:760753108 byr:1931 hgt:179cm',
            true
        ];

        yield 'missing cid and byr' => [
            'hcl:#cfa07d eyr:2025 pid:166559648 iyr:2011 ecl:brn hgt:59in',
            false
        ];
    }

    /**
     * @test
     * @dataProvider validationExamples
     */
    public function isValid(string $fields, bool $expected): void
    {
        self::assertSame($expected, PasswordValidator::isValid(fields($fields)));
    }

    /**
     * @return iterable<array-key, array{0: string, 1: bool}>
     */
    public function validationExamples(): iterable
    {
        yield [
            'eyr:1972 cid:100 hcl:#18171d ecl:amb hgt:170 pid:186cm iyr:2018 byr:1926',
            false
        ];

        yield [
            'iyr:2019 hcl:#602927 eyr:1967 hgt:170cm ecl:grn pid:012533040 byr:1946',
            false
        ];

        yield [
            'hcl:dab227 iyr:2012 ecl:brn hgt:182cm pid:021572410 eyr:2020 byr:1992 cid:277',
            false
        ];

        yield [
            'hgt:59cm ecl:zzz eyr:2038 hcl:74454a iyr:2023 pid:3556412378 byr:2007',
            false
        ];

        yield [
            'pid:087499704 hgt:74in ecl:grn iyr:2012 eyr:2030 byr:1980 hcl:#623a2f',
            true
        ];

        yield [
            'eyr:2029 ecl:blu cid:129 byr:1989 iyr:2014 pid:896056539 hcl:#a97842 hgt:165cm',
            true
        ];

        yield [
            'hcl:#888785 hgt:164cm byr:2001 iyr:2015 cid:88 pid:545766238 ecl:hzl eyr:2022',
            true
        ];

        yield [
            'iyr:2010 hgt:158cm hcl:#b6652a ecl:blu byr:1944 eyr:2021 pid:093154719',
            true
        ];
    }

    /**
     * @test
     */
    public function partOne(): void
    {
        self::assertSame(2, $this->subject->partOne(Input::fromString("ecl:gry pid:860033327 eyr:2020 hcl:#fffffd
byr:1937 iyr:2017 cid:147 hgt:183cm

iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884
hcl:#cfa07d byr:1929

hcl:#ae17e1 iyr:2013
eyr:2024
ecl:brn pid:760753108 byr:1931
hgt:179cm

hcl:#cfa07d eyr:2025 pid:166559648
iyr:2011 ecl:brn hgt:59in")));
    }

    /**
     * @test
     */
    public function partTwo(): void
    {
        self::assertSame(4, $this->subject->partTwo(Input::fromString("eyr:1972 cid:100
hcl:#18171d ecl:amb hgt:170 pid:186cm iyr:2018 byr:1926

iyr:2019
hcl:#602927 eyr:1967 hgt:170cm
ecl:grn pid:012533040 byr:1946

hcl:dab227 iyr:2012
ecl:brn hgt:182cm pid:021572410 eyr:2020 byr:1992 cid:277

hgt:59cm ecl:zzz
eyr:2038 hcl:74454a iyr:2023
pid:3556412378 byr:2007

pid:087499704 hgt:74in ecl:grn iyr:2012 eyr:2030 byr:1980
hcl:#623a2f

eyr:2029 ecl:blu cid:129 byr:1989
iyr:2014 pid:896056539 hcl:#a97842 hgt:165cm

hcl:#888785
hgt:164cm byr:2001 iyr:2015 cid:88
pid:545766238 ecl:hzl
eyr:2022

iyr:2010 hgt:158cm hcl:#b6652a ecl:blu byr:1944 eyr:2021 pid:093154719")));
    }


    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Solver();
    }
}
