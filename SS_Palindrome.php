<?php
/*
  Copyright (c) 2022 Aziom, Inc. All rights reserved.
*/

/*
Paramaters:
	s1	Test String 1
	s2	Test String 2
	
Returns:
	JSON array: Boolean, Float
		Row 1:	String1 Palindrome, microsecondss to execute
		Row 2:	String2 Palindrome, microsecondss to execute
		Row 3:	String1 & String2 Members Match, microsecondss to execute
*/


// Convert string to sorted array

function strToSortAry($str) {
	$strAry = str_split($str);
	sort($strAry);
	return $strAry;		// as ary
}


//	Tests if Passed string is a palindrome
//	Returns an array (result true/false, msecs to execute)

function testPalindrome($tstPalin) {
	$timeStart = microtime(true);
	$funcOutAry = array();

	$tst = strrev($tstPalin);
	$funcOutAry[] = ($tstPalin == $tst);

	$nano = time_nanosleep(0, 100);	// Forces microtime to reload
	$funcOutAry[] =  microtime(true) - $timeStart;
	return $funcOutAry;
}


//	Tests if Passed strings contain the same members
//	Returns an array (result: true/false, msec: time to execute)

function testMembers($mem1, $mem2) {
	$timeStart = microtime(true);
	$funcOutAry = array();

	$funcOutAry[] = strToSortAry($mem1) == strToSortAry($mem2);

	$nano = time_nanosleep(0, 100);	// Forces microtime to reload
	$funcOutAry[] =  microtime(true) - $timeStart;
	return $funcOutAry;
}	
		
//
//	Execution Starts Here
//

header('Content-type: application/json');

$datOutAry = array();

// Verify Invocation
if (!empty($_GET['s1'])) {
	$s1 = $_GET['s1'];
}

if (!empty($_GET['s2'])) {
	$s2 = $_GET['s2'];
}

// Launch tests based on munber of parameters
if ($s1) {
	$datOutAry[] = testPalindrome($s1);
	if ($s2) {
		$datOutAry[] = testPalindrome($s2);
		$datOutAry[] = testMembers($s1, $s2);
	}
}

// Output json
print json_encode($datOutAry);

?>
