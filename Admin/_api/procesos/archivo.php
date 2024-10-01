<? 
$copiado=0;

foreach($archivoRutas as $ruts){
 $laRuta=$rutaServer.$ruts;
 
	 if (!file_exists($laRuta)) {
	 	mkdir($laRuta, 0777);
		chmod($laRuta, 0777);
	}

}


if($archivoArchivo!=''){
	
	$tmp_name = $_FILES[$archivoArchivo]["tmp_name"];
	$name = $_FILES[$archivoArchivo]["name"];
	$peso = $_FILES[$archivoArchivo]["size"];
	
	if($archivoMultiple!=""){
	$tmp_name = $_FILES[$archivoArchivo]["tmp_name"][$i];
	$name = $_FILES[$archivoArchivo]["name"][$i];
	$peso = $_FILES[$archivoArchivo]["size"][$i];
	}
	
	$ext = getExtension($name);
 	$ext = strtolower($ext);
	$maxPeso=$archivoPeso*1024*1024;
	

	if ( in_array($ext,$archivoExts) && $peso<=$maxPeso){
	
	$aleatorio=aleatorio(3);
	$nombreBonito = preg_replace("/\\.[^.\\s]{3,4}$/", "", $name);
	$nombreBonito=nombreBonito($nombreBonito);
	 
	$yosoy = $nombreBonito."_".$aleatorio.".".$ext;
	if($archivoName!=""){$yosoy = $archivoName.".".$ext;}
	$copia=$laRuta."/".$yosoy;
	
	$yosoy2="t_".$nombreBonito."_".$aleatorio.".".$ext;
	if($archivoName!=""){$yosoy2 = "t_".$archivoName.".".$ext;}
	$copia2=$laRuta."/".$yosoy2;
	
	
		if(copy($tmp_name,$copia)){
		list($anchoImg, $alto) = getimagesize($copia);
			$copiado=1;		
		
			if($ext=="jpg" || $ext =="jpeg" || $ext=="png"){
			
			
			list($anchoImg, $alto) = getimagesize($copia);
			if($anchoImg>1500){
			smart_resize_image( $copia, $width = 1500, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 80) ;
			}
	
			
			
				copy($copia, $copia2);
				smart_resize_image( $copia2, $width = 400, $height = 400, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}
		
		$arregloArchivosCopia[$yosoy]=1;
					
		}
		
		
	}
}