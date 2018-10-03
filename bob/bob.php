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
        return (preg_match("/[\/?]$/", $testString)); 
            
        
    }
    
    public function isSilence()
    {
        $testString = $this->input;
        return (!preg_match("/[[:alnum:]]/", $testString)); 

    }
    
    public function isShouting()
    {
        $testString = $this->input;
        
        if (preg_match("/[A-Z0-9]{2,}/", $testString)) {
	        if (preg_match("/[a-z]/", $testString) == FALSE) {
	            return true;
	        }
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
