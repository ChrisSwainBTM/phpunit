<?php 

// $words = ['ΒΓΑ', 'ΒΓΔ', 'γβα'];
// $needle = 'ΑΒΓ';
// // // //
// print "hello world";

function detectAnagrams(string $needle, array $words) {
	// $needleArray[] = $needle;
	// $wordsArray[] = $words;
	$wordsA = array();
	$needleLower = strtolower($needle);
	$needleChars = str_split($needleLower, 1);
	asort($needleChars);
	$needleJoined = implode('', $needleChars);
	// if(!is_array($words)) {
	// 	$wordsA = array();
	// 	$wordsA .= array($words);
	// 	// print 'Butthole';
	// }

	// print gettype($words);
	// if(!is_array($words)) {	
	// 	$words = array($words);
	// }
	
		foreach($words as $k => $v) {
			if(strtolower($words[$k]) === strtolower($needle)) {
				continue;
			}
			
			$utf = (utf8_decode($words[$k]));
			// print_r($utf);
			
			if(strlen($words[$k]) != strlen(utf8_decode($words[$k]))){
				$json = json_encode($words[$k]);
				print_r($json);
			}

			if(strlen($words[$k]) === strlen($needle)) {
				
				// print 'strlenghts are equal';
			    // $needleLength = strlen($needle);
				$wordsLower = strtolower($words[$k]);
			    $wordChars = str_split($wordsLower, 1);
				asort($wordChars);
				
			    $wordsJoined = implode('', $wordChars);
				//print_r($needleChars);
				//print_r($wordChars);
				// print_r($diff) .'hello!';
				if($needleJoined === $wordsJoined && !in_array(strtolower($words[$k]),  array_map('strtolower', $wordsA))) {
					$wordsA[] = $words[$k];
				}
			}
		}	

	return($wordsA);

}

// detectAnagrams($words, $needle);