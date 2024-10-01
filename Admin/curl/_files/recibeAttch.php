<?php
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