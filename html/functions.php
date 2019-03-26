<?php
//Sanitizing the data coming from html
function GET($fieldname, &$flag){
	global $db ;
	$v = $_GET [$fieldname];
	$v = trim ( $v );
	if ($v == "") 
	  { $flag = true ; echo "<br>$fieldname is: Empty.<br>" ; return  ;} ;
	return $v; 
}


?>