<?php
// function to find if an user is eligible to post his experience
function checkIfEligibleToPost($registration_no){
	$length = strlen($registration_no);
	// registration no e.g. 20154142
	if($length < 8){
		return false;
	}

	if($length == 8){
		// find year from registration no
		$yearString = substr($registration_no,0,4);
		// convert year string to integer value
		$yearInt = intval($yearString);

		$currentYear = date('Y');
		$difference = $currentYear - $yearInt;

		$currentMonth = date('m');
		if(($currentMonth >= 7 && $difference >= 2)||( $difference >= 3 )){
			// eligible to post
			return true;
		}else{
			// not eligible to post
			return false;
		}
	}
}
