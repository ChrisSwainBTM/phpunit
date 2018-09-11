<?php 

// $words = ['ΒΓΑ', 'ΒΓΔ', 'γβα'];
// $needle = 'ΑΒΓ';

// print "hello world";

function detectAnagrams(string $needle, array $words)
{
	$wordsA = array();
	$wordsB = array();
	$NeedleArray = array();
	$coll = NULL;
	$needleMb = mb_strtolower($needle, mb_detect_encoding($needle));
	$needleArray[] = $needle;
	$unicodeWordsArray = array();
	$needleLower = strtolower($needle);
	$needleChars = str_split($needleLower, 1);
	asort($needleChars);
	$needleJoined = implode('', $needleChars);

	// print gettype($words);

	foreach($words as $k => $v) {
		if (strtolower($words[$k]) === strtolower($needle)) {
			continue;
		}

		if (strlen($words[$k]) != strlen(utf8_decode($words[$k]))) {
			if (mb_strlen($words[$k]) != strlen($needle)) {

				// $words[$k] = utf8_decode($words[$k]);
				// $needle = utf8_decode($needle);

				$mbWords = mb_strtolower($words[$k], mb_detect_encoding($words[$k]));
				$wordsSplit = str_split_unicode($mbWords, 1);
				$needleSplit = str_split_unicode($needleMb, 1);
				$coll = collator_create('en_US');
				collator_sort($coll, $wordsSplit);

				// $wordsSplit = array_values($wordsSplit);

				collator_sort($coll, $needleSplit);
				$needleJoined = implode('', $needleSplit);
				$wordsJoined = implode('', $wordsSplit);

				// print_r($needleJoined);
				// print_r($wordsJoined);

				if ($needleJoined === $wordsJoined && !in_array(strtolower($words[$k]) , array_map('strtolower', $wordsB))) {
					$wordsB[] = $words[$k];

					// print 'fuck you';

				}
			}

			// }

		}
		elseif (strlen($words[$k]) === strlen($needle)) {

			// print 'strlenghts are equal';
			// $needleLength = strlen($needle);

			$wordsLower = strtolower($words[$k]);
			$wordChars = str_split($wordsLower, 1);

			// print_r ($wordChars, mb_detect_encoding);

			asort($wordChars);
			$wordsJoined = implode('', $wordChars);

			// print_r($needleChars);
			// print_r($wordChars);
			// print_r($diff) .'hello!';

			if ($needleJoined === $wordsJoined && !in_array(strtolower($words[$k]) , array_map('strtolower', $wordsB))) {
				$wordsB[] = $words[$k];
			}
		}
	}

	return ($wordsB);

	// print_r($wordsC);

}

function str_split_unicode($str, $l = 0)
{
	if ($l > 0) {
		$ret = array();
		$len = mb_strlen($str, "UTF-8");
		for ($i = 0; $i < $len; $i+= $l) {
			$ret[] = mb_substr($str, $i, $l, "UTF-8");
		}

		return $ret;
	}

	return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

// detectAnagrams($words, $needle);

// detectAnagrams($words, $needle);