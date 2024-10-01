<?
$galleta=$_COOKIE[$huella] ?? '';
$huellaGalleta=$_COOKIE['device'] ?? '';

if($galleta!="" && $huellaGalleta!=""){

	
$laSesion =  explode('_',encripta('decrypt',$_COOKIE[$huella]));
$idU=    $laSesion[0];
$miClave=$laSesion[1];


	$selas="SELECT * FROM usuarios WHERE id='$idU'  LIMIT 1";
	$res = $mysqli->query($selas);
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) {
	
	$encripta =  encripta('encrypt',$idU."_".$miClave);
	$_SESSION[$huella.'_acceso']=$encripta;
	$_SESSION[$huella.'_galleta']=$superGalleta;
		 
	}

}

?>