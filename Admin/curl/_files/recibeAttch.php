<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
error_reporting(E_ALL);
ini_set('display_errors', 1);


extract($_POST);
include_once "funciones.php";
 
 
 if($puedo!="si"){
	die(); 
    exit();
 }
 
$tmp_name = $_FILES[$nombreArchivo]["tmp_name"];
$ruta=$_SERVER["DOCUMENT_ROOT"]."/contenido/attch/".$yosoy;
 
  
 
	 if(copy($tmp_name,$ruta)){
			
	
 
  }

?>