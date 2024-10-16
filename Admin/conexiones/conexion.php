<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
	$mysqli = new mysqli("localhost", "tooltec_tooltec", "4B6PIfO=?Mzy", "tooltec_tooltec");
	mysqli_set_charset($mysqli,"utf8");
	

?>
