<?php

//
// This is only a SKELETON file for the "Run Length Encoding" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function encode($input)
{
	$inputArray = str_split($input, 1);
	$count = strlen($input);
	$encodedString = '';
	// foreach($inputArray as $v) {
	//
	// }
	$i = 0;
	$j = 1;
	while($j <= $count) {
		while(isset($inputArray[$j]) && $inputArray[$i] === $inputArray[$j]) {
			$j++;
		}
		$runLength = $j - $i;
		$character = $inputArray[$i];
		//var_dump($runLength);
		//var_dump($character);
		if($runLength > 1) {
			$encodedString .= $runLength . $character;
		} else {
			$encodedString .= $character;
		}
		$i = $j;
		$j++;
		//var_dump([
		  //'i' => $i,
		  //'j' => $j,
		  //'count' => $count,
		//]);
	}
	return $encodedString;
	
}

function decode($input)
{
    $inputArray = str_split($input, 1);
	$decodedString = '';
	$multiplier = '';
	$i = 0;
	$j = 1;
	$count = count($inputArray);
	if(!is_numeric($inputArray[$i])) {
		return $input;
		print 'hello';
	}
	while($i <= $count && is_numeric($inputArray[$i])) {
		$multiplier .= $inputArray[$i];
		//print $multiplier;
		//print $j;
		$i++;
	}
	$j = $i;
	$decodedString .= str_repeat($inputArray[$j], $multiplier);
	$j++;
	if(ctype_alpha($inputArray[$j])) {
		$decodedString .= $inputArray[$j];
	}	
	
	if(is_numeric($inputArray[$j])) {
		$multiplier .= $inputArray[$j];
	}
	

	
	//$decodedString .= str_repeat($inputArray[$j] , $multiplier);
	//print $decodedString;
}
decode($input);

