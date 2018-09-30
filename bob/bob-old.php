<?php

class bob
{
    public function respondTo($input)
    {
        $key = '';
        $response = '';
        $last = endsWith($input);
        $first = startsWith($input);
        $stringSansLast = substr($input, 0, -1);
        $comma = ',';
        if (strpos($input, $comma) !== false) {
            $inputArray = explode($comma, $input);
        } else {
            $inputArray = str_split($input, 1);
        }
        $count = count($inputArray);
        $responses = [
            'StatingSomething' => 'Whatever.',
            'Shouting' => 'Whoa, chill out!',
            'ShoutingGibberish' => 'Whoa, chill out!',
            'AskingAQuestion' => 'Sure.',
            'AskingGibberish' => 'Sure.',
            'AskingANumericQuestion' => 'Sure.',
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
            'NonQuestionEndingWithWhitespace' => 'Whatever.'
        ];

        if ($last === '?') {
            $i = 0;
            foreach ($inputArray as $key => $value) {
                if (current($inputArray) === next($inputArray)) {
                    $i++;
                }
                if ($i >= 3) {
                    $key = 'AskingGibberish';
                }
            }
        }

        
        if (strpos($input, '?') !== false && $last != '?') {
            $key = 'MultipleLineQuestion';
        }
        
        if (strpos($input, ' ') !== false && $last != '.' && $last != '?' && $last != '!' && $last != ' ') {
            $spaceArrayOne = explode(' ', $input);
            if (count($spaceArrayOne) === count(array_filter($spaceArrayOne, 'ctype_upper'))) {
                $key = 'ShoutingWithNoExclamationMark';
            }
        }
        $second = substr($input, 0, 2);
        if (in_array(' ', $inputArray) && $last === '?') {
            $key = 'AskingAQuestion';
        }
        if (in_array(' ', $inputArray) && $last === '?' && ctype_upper($second)) {
            $key = 'ForcefulQuestion';
        }
        
        if (strpos($input, "\t") !== false) {
            $key = 'AlternateSilence';
        }
        
        if (count($inputArray) === count(array_filter($inputArray, 'is_numeric'))) {
            $key = 'OnlyNumbers';
        }
        
        if (count($inputArray) === count(array_filter($inputArray, 'ctype_upper'))) {
            $key = 'ShoutingGibberish';
        }
        
        if ($input == '') {
            $key = 'Silence';
        }
        
        if (substr($input, 0, 1) === ' ') {
            if (isCharacter($last)) {
                $key = 'StartingWithWhitespace';
            }
        }
        
        if ($first === ' ' && $last === ' ' && substr_count($input, ' ') === strlen($input) && strpos($input, '/t') == false) {
            $key = 'ProlongedSilence';
        }
        
        if ($last === '!' && strpos($stringSansLast, ' ') !== false) {
            $spaceArray = explode(' ', $stringSansLast);
            if (count($spaceArray) === count(array_filter($spaceArray, 'ctype_upper'))) {
                $key = 'Shouting';
            }
            if (count($spaceArray) != count(array_filter($spaceArray, 'ctype_upper'))) {
                $key = 'TalkingForcefully';
            }
        }
        
        if ($last === '!' && strpos($input, $comma) !== false) {
            foreach ($inputArray as $key => $value) {
                if (is_numeric($inputArray[$key][$value])) {
                    $key = 'ShoutingNumbers';
                    continue;
                }
            }
        }
        
        if ($last === '?' && is_numeric($first)) {
            $key = 'QuestionWithOnlyNumbers';
        }
        
        if (strpos($input, '*') !== false) {
            $key = 'ShoutingWithSpecialCharacters';
        }
        
        if ($last === ' ' && strpos($input, '?') !== false) {
            $key = 'EndingWithWhitespace';
        }
        
        if ($last === ' ' && strpos($input, '?') === false && $first != ' ') {
            $key = 'NonQuestionEndingWithWhitespace';
        }
        
        
        if ($last === '.' && strpos($input, ' ') !== false) {
            $spaceArray = explode(' ', $stringSansLast);
            if (count($spaceArray) != count(array_filter($spaceArray, 'ctype_upper'))) {
                $key = 'TalkingForcefully';
            }
        }
        
        foreach ($inputArray as $k => $v) {
            if (strpos($inputArray[$k], '?') !== false) {
                $lastCharactersArray = str_split($inputArray[$k], 1);
                $end = array_pop($lastCharactersArray);
                if ($end === '?') {
                    $next = array_pop($lastCharactersArray);
                    if (is_numeric($next)) {
                        $key = 'AskingANumericQuestion';
                    }
                }
            }
        }
        
        foreach ($responses as $k => $v) {
            if ($key === $k) {
                $response = $responses[$k];
            }
        }
        
        return $response;
    }
}

function startsWith(string $string)
{
    $firstCharacter = substr($string, 0, 1);
    return $firstCharacter;
}

function endsWith(string $string)
{
    $lastCharacter = substr($string, -1);
    return $lastCharacter;
}

function isCharacter(string $string)
{
    if (ctype_alpha($string)) {
        return true;
    } elseif (ctype_punct($string)) {
        return true;
    } elseif (is_numeric($string)) {
        return true;
    } else {
        return false;
    }
}
