<?php


class bob {
	
	public function respondTo($input) {
		
		$response = '';
		$responses = [
			'StatingSomething' => 'Whatever.',
			'Shouting' => 'Whoa, chill out!',
			'AskingAQuestion' => 'Sure.',
			'TalkingForcefully' => 'Whatever.',
			'UsingAcronymsInRegularSpeech' => 'Whatever.',
			'ForcefulQuestion' => 'Calm down, I know what I\'m doing!',
			'ShoutingNumbers' => 'Whoa, chill out!',
			'OnlyNumbers' => 'Whatever.',
			'QuestionWithOnlyNumbers' => 'Sure.',
			'ShoutingWithSpecialCharacters' => 'Whoa, chill out!',
			'ShoutingWithNoExclamationMark' => 'Whoa, chill out!',
			'StatementContainingQuestionMark' => 'Whatever.',
			'NonLettersWithQuestion' => 'Sure.',
			'PrattlingOn' => 'Sure.',
			'Silence' => 'Fine. Be that way!',
			'ProlongedSilence' => 'Fine. Be that way!',
			'AlternateSilence' => 'Fine. Be that way!',
			'MultipleLineQuestion' => 'Whatever.',
			'StartingWithWhitespace' => 'Whatever.',
			'EndingWithWhitespace' => 'Sure.',
			'NonQuestionEndingWithWhitespace' => 'Whatever.',
		];
		
		$inputArray = str_split($input, 1);
		
		if($input == '') {
			$key = 'Silence';
		}

		if(startsWith($input, ' ') && endsWith($input, ' ')) {
			$key = 'ProlongedSilence';
		} 
		
		if(startsWith($input, ' ')) {
			$key = 'StartingWithWhitespace';
		}
		if(is_numeric($input)) {
			$key = 'OnlyNumbers'; 
		}
		
		foreach($inputArray as $key => $value) {
			if(ctype_upper($inputArray[$key]) && array_pop($inputArray) === '!') {
				$key = 'Shouting';
			}
		}
		
		foreach($responses as $k => $v) {
			if($key === $k) {
				$response = $responses[$k];
				return $response;
			}
			
		}
        
	} 
}

function startsWith(string $string) {
	$firstCharacter = substr($string, 0, 1);
	return $firstCharacter;
}

function endsWith(string $string) {
	$stringArray = str_split($string, 1);
	$lastCharacter = array_pop($stringArray);
	return $lastCharacter;
}



// print bob::respondTo($response, $input);