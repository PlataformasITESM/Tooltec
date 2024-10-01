<? include "../sesion/arriba.php"; 
extract($_POST);

	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$tipoContenido="slider";

	
	//margenes
	$derechoV=0;
	if($derecho=="on"){$derechoV='1.5%';} 
	
	$inferiorV=0;
	if($inferior=="on"){$inferiorV='15px';} 
	
	$margen='0 '.$derechoV." ".$inferiorV." 0";
	

	
	if($cambia!=""){
		$query="UPDATE contenido SET margen='$margen',ancho='$ancho'    WHERE id='$cambia'";
		$mysqli->query($query);	

	}
	
	
	if($cambia==""){	
			
	$query1="INSERT INTO contenido (idSeccion,idElemento,tipo,texto,texto2,margen,ancho,liga,ligaTarget,orden) VALUES ('$seccion','$padre,'$tipoContenido',','$idioma','$margen','$ancho','$liga','$ligaTarget','100')";
	$mysqli->query($query1);
	$cambia=$mysqli->insert_id ;

 
}
	
	
	//img
	
	$cualFoto="img"; 
	
	for($i=0; $i<count($_FILES[$cualFoto]['name']); $i++) {

	$tmp_name = $_FILES[$cualFoto]["tmp_name"][$i];
	$name = $_FILES[$cualFoto]["name"][$i];
    $nameF = pathinfo($name);	
	$nameF=$nameF['filename'][$i];
	
	$nombreArchivo=nombreBonito($nameF);
	$prefijo = substr(md5(uniqid(rand())),0,3);
	$ext = getExtension($name);
 	$ext = strtolower($ext);
	
	if (($ext == "jpg")  || ($ext == "png") ||( $ext == "jpeg") ){
	$yosoy = $nombreArchivo."_".$prefijo.".".$ext;
	$arregloSliders[]=$yosoy;
	$ruta =  $rutaContent."/".$seccion."/".$yosoy;
	

	$liga=mataMalos($liga);
	$ligaTarget=mataMalos($ligaTarget);
	
	if (copy($tmp_name,$ruta)) {
	//imagen para impresion
	list($anchoImg, $alto) = getimagesize($ruta);
			
			if($anchoImg>1200){
			smart_resize_image( $ruta, $width = 1200, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}
			
		$query1="INSERT INTO contenidoSlider (idSeccion,idElemento,img,orden) VALUES ('$seccion','$padre,'$cambia','$yosoy','100')";
	$mysqli->query($query1);	
			
	}
		
	}
	
	//img
	

}


include "acomodo.php";	


?>

