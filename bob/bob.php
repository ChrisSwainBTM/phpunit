<?php

class bob
{
    private $bobSays;
    private $responses = [
        'Silence' => 'Fine. Be that way!',
        'Shouting' => 'Whoa, chill out!',
        'AskingAQuestion' => 'Sure.',
        'ForcefulQuestion' => 'Calm down, I know what I\'m doing!',
        'Generic' => 'Whatever.'
    ];
    
    public function isQuestion()
    {
        $testString = trim($this->input);
        $lastCharacter = substr($testString, -1);
        $testStringUpper = strtoupper($testString);
        $testStringMinusLast = substr($testString, 0, -1);
        $testStringNoSpaces = str_replace(' ', '', $testStringMinusLast);
        if ($lastCharacter === '?') {
            if ($testStringNoSpaces === strtoupper($testStringNoSpaces) && ctype_alpha($testStringNoSpaces)) {
                return true;
            }
            if (strpos($testStringMinusLast, '?') == false) {
                return true;
            }
        }
    }
    
    public function isSilence()
    {
        $testString = $this->input;
        $testStringNoSpaces = str_replace(' ', '', $testString);
        $pregMatch = preg_match("/[\t]/", $testString, $matches, PREG_OFFSET_CAPTURE);
        if (!empty($matches)) {
            return true;
        }
        if ($testStringNoSpaces === '') {
            return true;
        }
    }
    
    public function isShouting()
    {
        $testString = $this->input;
        $testStringUpper = strtoupper($testString);
        $shoutArray = str_split($testString, 1);
        $testStringNoSpaces = str_replace(' ', '', $testString);
        $lastCharacter = substr($testString, -1);
        $testStringMinusLast = substr($testString, 0, -1);
        $testStringMinusLastNoSpaces = str_replace(' ', '', $testStringMinusLast);
        if (count($shoutArray) === count(array_filter($shoutArray, 'ctype_upper'))) {
            return true;
        }
        
        if ($lastCharacter === '!' && $testString === $testStringUpper) {
            return true;
        }
        
        if ($lastCharacter === '?' && $testStringMinusLastNoSpaces === strtoupper($testStringMinusLastNoSpaces) && ctype_alpha($testStringMinusLastNoSpaces)) {
            return true;
        }
        
        if (ctype_alpha($testStringNoSpaces) && !is_numeric($testString) && $testString === $testStringUpper) {
            return true;
        }
    }
   
    public function respondTo($input)
    {
        $this->input = $input;
        if ($this->isQuestion() && $this->isShouting()) {
            return $this->responses['ForcefulQuestion'];
        };
        
        if ($this->isQuestion()) {
            return $this->responses['AskingAQuestion'];
        }
        
        if ($this->isSilence()) {
            return $this->responses['Silence'];
        }
        
        if ($this->isShouting()) {
            return $this->responses['Shouting'];
        }
        
        return $this->responses['Generic'];
    }
}
