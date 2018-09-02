<?php 

function toRoman($a) {
 // Convert the integer into an integer (just to make sure)
 $a = intval($a);
 $result = '';
 
 // Create a lookup array that contains all of the Roman numerals.
 $romanSet = array(
 'M' => 1000,
 'CM' => 900,
 'D' => 500,
 'CD' => 400,
 'C' => 100,
 'XC' => 90,
 'L' => 50,
 'XL' => 40,
 'X' => 10,
 'IX' => 9,
 'V' => 5,
 'IV' => 4,
 'I' => 1);
 
 foreach($romanSet as $roman => $value){
  // Determine the number of matches
  $matches = intval($a/$value);
 
  // Add the same number of characters to the string
  $result .= str_repeat($roman,$matches);
 
  // Set the integer to be the remainder of the integer and the value
  $a = $a % $value;
 }
 
 // The Roman numeral should be built, return it
 return $result;
}