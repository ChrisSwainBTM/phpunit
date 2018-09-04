<?php

class Robot {
	
    private $name;
    private $letters;
    private static $names = [];
	
    public function __construct() {
        $this->letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		$this->numeric = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
		$this->reset();
    }
	
    public function getName() {
        return $this->name;
    }
	
	public function reset() {
		shuffle($this->letters);
		$charOne = $this->letters[0];
		shuffle($this->letters);
		$charTwo = $this->letters[0];
		shuffle($this->numeric);
		$charThree = $this->numeric[0];
		shuffle($this->numeric);
		$charFour = $this->numeric[0];
		shuffle($this->numeric);
		$charFive = $this->numeric[0];

		$newRobotName = $charOne.$charTwo.$charThree.$charFour.$charFive;
		
		if(!in_array($newRobotName, self::$names)) {
			$this->name = $newRobotName;
			self::$names[] = $this->name;
		} else {
			$this->reset();
		}
		
  	}	
}	
	