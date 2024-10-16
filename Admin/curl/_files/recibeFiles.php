<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
error_reporting (0);
ini_set('memory_limit', '512M');


extract($_POST);
include_once "funciones.php";
 
 
 if($puedo!="si"){
	die(); 
    exit();
 }
 
$tmp_name = $_FILES["file"]["tmp_name"];

$rutaO=$ruta;

$ruta2=$ruta."/t_".$yosoy;
$ruta=$ruta."/".$yosoy;




$ext = getExtension($yosoy);
$ext = strtolower($ext);

if ($_FILES["file"]["error"] > 0)
  {

  }
else
  {
 
 /* borrar */

$mata=$rutaO."/".$anterior;
$mata2=$rutaO."/t_".$anterior;
 
if (file_exists($mata)) {
	unlink($mata);
}

if (file_exists($mata2)) {
	unlink($mata2);
}

 
 /*  */
 
 
 
	 if(copy($tmp_name,$ruta)){
			
			
	
	//si es imagen
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png"){
	
	list($anchoImg, $alto) = getimagesize($ruta);
			
			if($anchoImg>1500){
			smart_resize_image( $ruta, $width = 1500, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 85) ;
			}
	
	
		
		 
	if(copy($ruta,$ruta2)){
			list($ancho2, $alto2) = getimagesize($ruta2);
			//imgThumb
			$imgAncho2=600;
			$imgAlto2=600;
			include "_imgProcess/imgThumbResize.php";
	
	}
		 
	
	}
	
	
	
	 echo"ok";
 
 
  }
  }
?>