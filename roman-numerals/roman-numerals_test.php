<?php

require_once "roman-numerals.php";

class RomanTest extends PHPUnit\Framework\TestCase
{
    public function test1()
    {
		$a = 1;
        $this->assertSame('I', toRoman(1));
    }

    public function test2()
    {
        $a = 2;
		$this->assertSame('II', toRoman(2));
    }

    public function test3()
    {
		$a = 3;
        $this->assertSame('III', toRoman(3));
    }

    public function test4()
    {
		$a = 4;
        $this->assertSame('IV', toRoman(4));
    }

    public function test5()
    {
		$a = 5;
        $this->assertSame('V', toRoman(5));
    }

    public function test6()
    {
		$a = 6;
        $this->assertSame('VI', toRoman(6));
    }

    public function test9()
    {
		$a = 9;
        $this->assertSame('IX', toRoman(9));
    }

    public function test27()
    {
		$a = 27;
        $this->assertSame('XXVII', toRoman(27));
    }

    public function test48()
    {
		$a = 48;
        $this->assertSame('XLVIII', toRoman(48));
    }

    public function test49()
    {
		$a = 49;
        $this->assertSame('XLIX', toRoman(49));
    }

    public function test59()
    {
		$a = 59;
        $this->assertSame('LIX', toRoman(59));
    }

    public function test93()
    {
		$a = 93;
        $this->assertSame('XCIII', toRoman(93));
    }

    public function test141()
    {
		$a = 141;
        $this->assertSame('CXLI', toRoman(141));
    }

    public function test163()
    {
		$a = 163;
        $this->assertSame('CLXIII', toRoman(163));
    }

    public function test402()
    {
		$a = 402;
        $this->assertSame('CDII', toRoman(402));
    }

    public function test575()
    {
		$a = 575;
        $this->assertSame('DLXXV', toRoman(575));
    }

    public function test911()
    {
		$a = 911;
        $this->assertSame('CMXI', toRoman(911));
    }

    public function test1024()
    {
		$a = 1024;
        $this->assertSame('MXXIV', toRoman(1024));
    }

    public function test1998()
    {
		$a = 1998;
        $this->assertSame('MCMXCVIII', toRoman(1998));
    }

    public function test2999()
    {
		$a = 2999;
        $this->assertSame('MMCMXCIX', toRoman(2999));
    }

    public function test3000()
    {
		$a = 3000;
        $this->assertSame('MMM', toRoman(3000));
    }
}
