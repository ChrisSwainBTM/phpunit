<?php 

function detectAnagrams(string $needle, array $words) {
	$wordsA = array();
	$NeedleArray = array();
	$needleMb = mb_strtolower($needle, mb_detect_encoding($needle));
	$needleLower = strtolower($needle);
	$needleChars = str_split($needleLower, 1);
	asort($needleChars);
	$needleJoined = implode('', $needleChars);

	foreach($words as $k => $v) {
		if (strtolower($words[$k]) === strtolower($needle)) {
			continue;
		}

		if (strlen($words[$k]) != strlen(utf8_decode($words[$k]))) {
			if (mb_strlen($words[$k]) != strlen($needle)) {

				$mbWords = mb_strtolower($words[$k], mb_detect_encoding($words[$k]));
				$wordsSplit = str_split_unicode($mbWords, 1);
				$needleSplit = str_split_unicode($needleMb, 1);
				$coll = collator_create('en_US');
				collator_sort($coll, $wordsSplit);
				collator_sort($coll, $needleSplit);
				$needleJoined = implode('', $needleSplit);
				$wordsJoined = implode('', $wordsSplit);

				if ($needleJoined === $wordsJoined && !in_array(strtolower($words[$k]) , array_map('strtolower', $wordsA))) {
					$wordsA[] = $words[$k];

				}
			}

		}
		elseif (strlen($words[$k]) === strlen($needle)) {
			$wordsLower = strtolower($words[$k]);
			$wordChars = str_split($wordsLower, 1);
			asort($wordChars);
			$wordsJoined = implode('', $wordChars);

			if ($needleJoined === $wordsJoined && !in_array(strtolower($words[$k]) , array_map('strtolower', $wordsA))) {
				$wordsA[] = $words[$k];
			}
		}
	}

	return ($wordsA);

}

function str_split_unicode($str, $l = 0) {
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