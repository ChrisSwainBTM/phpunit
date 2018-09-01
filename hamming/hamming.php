<?php

//
// This is only a SKELETON file for the "Hamming" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function distance($a, $b)
{
	$alength = strlen($a);
	$blength = strlen($b);
	
	if($alength === $blength) {
		if($a === $b) {
			$diff = 0;
		} else {
		    $a = str_split($a, 1);
			$b = str_split($b, 1);
	
			$diff = 0;
	
		   foreach ($a as $k => $v) {
		     if($b[$k] != $a[$k]) {
		         $diff++;
		     }
		   }
		}
		return $diff;
	} else {
		throw new InvalidArgumentException("DNA strands must be of equal length.", 1);
	}

}
