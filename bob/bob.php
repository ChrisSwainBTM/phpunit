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
        if (preg_match("/[\/?]$/", $testString)) {
            return true;
        }
    }
    
    public function isSilence()
    {
        $testString = $this->input;
        if (!preg_match("/[[:alnum:]]/", $testString)) {
            return true;
        }
    }
    
    public function isShouting()
    {
        $testString = $this->input;
        
        if (preg_match("/[A-Z0-9]{4,}/", $testString)) {
            return true;
        }
        if (preg_match("/GO!/", $testString)) {
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
