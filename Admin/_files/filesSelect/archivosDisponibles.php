<?
/* archivos */
$arregloArchivos=array();

 
	

$sel="SELECT * FROM cRepositorioArchivos";
$res6 = $mysqli->query($sel);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{	
	$idArchivo= $fila['id'];	
	$idFolder= $fila['idFolder'];	
	$tipoArchivo= $fila['tipo'];
	$modificado= $fila['modificado'];
	$archivoInfo= unserialize($fila['info']);
	$fileNombre=$archivoInfo['nombre'];
    $fileExt=$archivoInfo['ext'] ;	
	
	
	$imagen="";

		if($tipoArchivo=="video" ){
		$imagen='<img src="'.$url.'/iconos/video.svg" width="20">';
		}

		
		if($tipoArchivo=="doc" ){
		$imagen='<img src="'.$url.'/iconos/documento.svg" width="20">';
		}
		
		if($tipoArchivo=="zip"   ){
		$imagen='<img src="'.$url.'/iconos/zip.svg" width="20">';
		}
		
		
		if($tipoArchivo=="audio"   ){
		$imagen='<img src="'.$url.'/iconos/audio.svg" width="20">';
		}
	
		
		if($tipoArchivo=="img"){
		$imagen='<img src="/contenido/'.$idFolder.'/t_'.$fileNombre.'?a='.$modificado.'" height="70">';
		if($fileExt=="gif" || $fileExt=="svg"){
		$imagen='<img src="/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$modificado.'" height="70">';
		}
		$imagenImpresion="/contenido/".$idFolder."/t_".$fileNombre;
		$imagenFront="/contenido/".$idFolder."/".$fileNombre;
		$imagenFrontT="/contenido/".$idFolder."/t_".$fileNombre;
		$arregloArchivos[$idArchivo.'imagenImpresion']=$imagenImpresion;
		$arregloArchivos[$idArchivo.'imagenFront']=$imagenFront;
		$arregloArchivos[$idArchivo.'imagenFrontT']=$imagenFrontT;
		
		
		if($fileExt=="gif" || $fileExt=="svg"){
		$imagen='<img src="/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$modificado.'" height="70">';
		$arregloArchivos[$idArchivo.'imagenFrontT']=$imagenFront;
		}
		
		
		}
		
		$arregloArchivos[$idArchivo.'tipo']=$tipoArchivo;
		$arregloArchivos[$idArchivo.'nombre']=$fileNombre;
		$arregloArchivos[$idArchivo.'ruta']='/contenido/'.$idFolder.'/'.$fileNombre;
		$arregloArchivos[$idArchivo.'imagen']=$imagen;

	 
}

/* archivos */
//print_r($arregloArchivos);
				
                ?>