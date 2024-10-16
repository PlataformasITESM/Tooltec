<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
error_reporting (0);
ini_set('memory_limit', '32M');
 


extract($_POST);
include_once "funciones.php";
 
 
 if($puedo!="si"){
	die(); 
    exit();
 }
 
 


$eliminados=explode(',',$eliminados);
foreach ($eliminados as $eliminin){
	


$ruta2=$ruta."/t_".$eliminin;

$ruta=$ruta."/".$eliminin;

if (file_exists($ruta)) {
	unlink($ruta);
}

if (file_exists($ruta2)) {
	unlink($ruta2);
}

	
}





	
	 echo"ok";
 
?>