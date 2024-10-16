<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
//error_reporting (0);

error_reporting(E_ALL);
ini_set('display_errors', 1);
 
extract($_POST);
include_once "funciones.php";
 
 if($puedo!="si"){
//	die(); 

 }


		mkdir($ruta, 0777);
		chmod($ruta, 0777);
		
		if (file_exists($ruta)) {
			
			echo"ok";
		}

?>