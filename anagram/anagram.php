<?php 

// $words = ['tan', 'stand', 'at'];
// $needle = ['ant'];
// // //
// print "hello world";

function detectAnagrams($words, $needle) {
	// $needleArray[] = $needle;
	// $wordsArray[] = $words;
	$array = array();
	if(!is_array($words)) {
		$wordsA = array();
		$wordsA .= array($words);
		// print Butthole;
	}

	// print gettype($words);
	// if(!is_array($words)) {
	// 	$words = array($words);
	// }
	  	if(is_array($words)) {
		foreach($words as $k => $v) {
			
			// print_r($words[$k]);
		
			if(strlen($words[$k]) == strlen($needle[$k])) {
				// print 'strlenghts are equal';
			    $needleChars = str_split($needle[$k], 1);
			    $needleLength = strlen($needle[$k]);
			    $wordChars = str_split($words[$k], 1);
				//print_r($needleChars);
				//print_r($wordChars);
	            $diff = array_diff($needleChars, $wordChars);
				// print_r($diff) .'hello!';
				if(empty($diff)){
					$wordsA = array();
					$wordsA = array($words[$k]);
					print_r($wordsA);
				} else{
					return $array;
				}	
			
			} else {
				return $array;
				// print 'dick';
			}
		}	
	} else {
		return $array;
	}
	// print_r($words);
	
}

detectAnagrams($words, $needle);