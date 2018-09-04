<?php

class Robot {
	
    private $name;
    private $letters;
    private static $names = [];
	
    public function __construct() {
        $this->letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		$this->numeric = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
		$this->reset();
		$this->i = 0;
		$i = 0;
    }
	
    public function getName() {
        return $this->name;
    }
	
	public function reset() {
		foreach($this->letters as $v) {
			while($this->i < 2) {
				$this->i++;
				$charOne = array_pop($this->letters);
				shuffle($this->letters);
				$charTwo = array_pop($this->letters);
			}
		}
		foreach($this->numeric as $v) {
			while($this->i < 3) {
				$this->i++;
				$charThree = array_pop($this->numeric);
				shuffle($this->numeric);
				$charFour = array_pop($this->numeric);
				$charFive = array_pop($this->numeric);
			}
		}
	
		$this->name = $charOne.$charTwo.$charThree.$charFour.$charFive;
		$this->reset();
	 }
  	}	
	
	