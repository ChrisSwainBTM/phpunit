<?php

require "anagram.php";

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public function testNoMatches()
    {
		$words = ['hello', 'world', 'zombies', 'pants'];
		$needle = ['diaper'];
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    public function testDetectsSimpleAnagram()
    {
		$words = ['tan', 'stand', 'at'];
		$needle = ['ant'];
        $this->assertEquals(['tan'], detectAnagrams('ant', ['tan', 'stand', 'at']));
    }

    public function testDoesNotDetectFalsePositives()
    {
		$words = ['eagle'];
		$needle = ['galea'];
        $this->assertEquals([], detectAnagrams('galea', ['eagle']));
    }

    public function testDetectsMultipleAnagrams()
    {
		$words = ['stream', 'pigeon', 'maters'];
		$needle = ['master'];
        $this->assertEquals(['stream', 'maters'], detectAnagrams('master', ['stream', 'pigeon', 'maters']));
    }

    public function testDoesNotDetectAnagramSubsets()
    {
		$words = ['dog', 'goody'];
		$niddle = ['good'];
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    public function testDetectsAnagram()
    {
		$words = array('enlists', 'google', 'inlets', 'banana');
		$needle = ['listen'];
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    public function testDetectsMultipleAnagrams2()
    {
		$words = ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'];
		$needle = ['allergy'];
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    public function testDoesNotDetectIdenticalWords()
    {
		$words = ['corn', 'dark', 'Corn', 'rank', 'CORN', 'cron', 'park'];
		$needle = ['corn'];
        $this->assertEquals(['cron'], detectAnagrams('corn', ['corn', 'dark', 'Corn', 'rank', 'CORN', 'cron', 'park']));
    }

    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum()
    {
		$words = ['last'];
		$needle = ['mass'];
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsAnagramsCaseInsensitively()
    {
		$words = ['cashregister', 'Carthorse', 'radishes'];
		$needle = ['Orchestra'];
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitiveSubject()
    {
		$words = ['cashregister', 'carthorse', 'radishes'];
		$needle = ['Orchestra'];
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ['cashregister', 'carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches()
    {
		$words = ['cashregister', 'Carthorse', 'radishes'];
		$needle = ['orchestra'];
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDoesNotDetectAWordAsItsOwnAnagram()
    {
		$words = ['Banana'];
		$needle = ['banana'];
        $this->assertEquals([], detectAnagrams('banana', ['Banana']));
    }

    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated()
    {
		$words = ['go Go GO'];
		$needle = ['go'];
        $this->assertEquals([], detectAnagrams('go', ['go Go GO']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce()
    {
		$words = ['patter'];
		$needle = ['tapper'];
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    public function testEliminatesAnagramsWithTheSameChecksum()
    {
		$words = ['last'];
		$needle = ['mass'];
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsUnicodeAnagrams()
    {
		$words = ['ΒΓΑ', 'ΒΓΔ', 'γβα'];
		$needle = ['ΑΒΓ'];
        $this->assertEquals(['ΒΓΑ', 'γβα'], detectAnagrams('ΑΒΓ', ['ΒΓΑ', 'ΒΓΔ', 'γβα']));
    }

    public function testEliminatesMisleadingUnicodeAnagrams()
    {
		$words = ['ABΓ'];
		$needle =[ 'ΑΒΓ'];
        $this->assertEquals([], detectAnagrams('ΑΒΓ', ['ABΓ']));
    }

    public function testCapitalWordIsNotOwnAnagram()
    {
		$words = ['Banana'];
		$needle = ['BANANA'];
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce2()
    {
		$words = ['tapper'];
		$needle = ['patter'];
        $this->assertEquals([], detectAnagrams('patter', ['tapper']));
    }
}
