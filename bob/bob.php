<?php

class bob
{
    private $bobSays;
    private $key;
    private $keyParsing;
    private $response;
    private $responses = [
        'Silence' => 'Fine. Be that way!',
        'Shouting' => 'Whoa, chill out!',
        'AskingAQuestion' => 'Sure.',
        'ForcefulQuestion' => 'Calm down, I know what I\'m doing!',
        'Generic' => 'Whatever.'
    ];
    
    public function keyParsing()
    {
        $testString = $this->getBobSays();
        
        if ($this->isQuestion($testString)) {
            return;
        }

        if ($this->isSilence($testString)) {
            return;
        }

        if ($this->isShouting($testString)) {
            return;
        }

        $this->setKey('Generic');
    }
    
    public function isQuestion()
    {
        $testString = trim($this->getBobSays());
        $lastCharacter = substr($testString, -1);
        $testStringUpper = strtoupper($testString);
        $testStringMinusLast = substr($testString, 0, -1);
        $testStringNoSpaces = str_replace(' ', '', $testStringMinusLast);
        if ($lastCharacter === '?') {
            if (strpos($testStringMinusLast, '?') == false) {
                $this->setKey('AskingAQuestion');
            }
            if ($testStringNoSpaces === strtoupper($testStringNoSpaces) && ctype_alpha($testStringNoSpaces)) {
                $this->setKey('ForcefulQuestion');
            }
        }
    }
    
    public function isSilence()
    {
        $testString = $this->getBobSays();
        $testStringNoSpaces = str_replace(' ', '', $testString);
        $pregMatch = preg_match("/[\t]/", $testString, $matches, PREG_OFFSET_CAPTURE);
        if (!empty($matches)) {
            $this->setKey('Silence');
        }
        if ($testStringNoSpaces === '') {
            $this->setKey('Silence');
        }
    }
    
    public function isShouting()
    {
        $testString = $this->getBobSays();
        $testStringUpper = strtoupper($testString);
        $shoutArray = str_split($testString, 1);
        $testStringNoSpaces = str_replace(' ', '', $testString);
        $lastCharacter = substr($testString, -1);
        $testStringMinusLast = substr($testString, 0, -1);
        if (count($shoutArray) === count(array_filter($shoutArray, 'ctype_upper'))) {
            $this->setKey('Shouting');
        }
        
        if ($lastCharacter === '!' && $testString === $testStringUpper) {
            $this->setKey('Shouting');
        }
        
        if (ctype_alpha($testStringNoSpaces) && !is_numeric($testString) && $testString === $testStringUpper) {
            $this->setKey('Shouting');
        }
    }
    
    public function runLoop()
    {
        $responses = $this->getResponses();
        $key = $this->getKey();
        foreach ($responses as $k => $v) {
            if ($k === $key) {
                $this->setResponse($responses[$k]);
                return $this;
            }
        }
    }
    public function respondTo($input)
    {
        $this->bobSays = $input;
        $this->keyParsing();
        $this->isQuestion();
        $this->isSilence();
        $this->isShouting();
        $this->runLoop();
        return $this->response;
    }
        
    public function getResponses()
    {
        return $this->responses;
    }
        
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }
    
    public function setResponse($response)
    {
        $this->response = $response;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
    
    public function getKey()
    {
        return $this->key;
    }
    
    public function setKey($key)
    {
        $this->key = $key;
    }
        
    public function getBobSays()
    {
        return $this->bobSays;
    }
    
    public function setBobSays($bobSays)
    {
        $this->bobSays = $bobSays;
        return $this;
    }
}
