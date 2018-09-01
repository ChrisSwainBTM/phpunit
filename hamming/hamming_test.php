<?php

require "hamming.php";

class HammingComparatorTest extends PHPUnit\Framework\TestCase
{

    public function testNoDifferenceBetweenIdenticalStrands()
    {
		$a = 'A';
		$b = 'A';
        $this->assertEquals(0, distance($a , $b));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
		$a = 'A';
		$b = 'G';
        $this->assertEquals(1, distance($a, $b));
    }

    public function testCompleteHammingDistanceForSmallStrand()
    {
		$a = 'AG';
		$b = 'CT';
        $this->assertEquals(2, distance($a, $b));
    }

    public function testSmallHammingDistance()
    {
		$a = 'AT';
		$b = 'CT';
        $this->assertEquals(1, distance($a, $b));
    }

    public function testSmallHammingDistanceInLongerStrand()
    {
		$a = 'GGACG';
		$b = 'GGTCG';
        $this->assertEquals(1, distance($a, $b));
    }

    public function testLargeHammingDistance()
    {
		$a = 'GATACA';
		$b = 'GCATAA';
        $this->assertEquals(4, distance($a, $b));
    }

    public function testHammingDistanceInVeryLongStrand()
    {   
		$a = 'GGACGGATTCTG';
		$b = 'AGGACGGATTCT';
        $this->assertEquals(9, distance($a, $b));
    }

    public function testExceptionThrownWhenStrandsAreDifferentLength()
    {
		$a = 'GGACG';
		$b = 'AGGACGTGG';
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('DNA strands must be of equal length.');
        distance($a, $b);
    }
}
