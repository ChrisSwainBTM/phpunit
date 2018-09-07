<?php
	
	function from($date) {
		$gigasecond = pow(10, 9);
		return $date->add(new DateInterval(PT.$gigasecond.S));
	}
	
	
	
	