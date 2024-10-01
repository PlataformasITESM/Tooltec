<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 


$idFolder=limpiaGET($c);
$cuantosArchivos=limpiaGET($cuantosArchivos);
$contenedor=limpiaGET($contenedor);
$tipoArchivoSeleccion=limpiaGET($tipoArchivoSeleccion);

$sel25 = "SELECT * FROM  cRepositorioFolders WHERE id='$idFolder' ";

$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	$idFolder= $fila25['id'];
	$nombre= $fila25['nombre'];
 
}	


$tipoInput="radio";
if($tipoArchivoSeleccion!=""){$buscaTipo="AND tipo='".$tipoArchivoSeleccion."'";}
if($cuantosArchivos==1){$tipoInput="radio";}
if($cuantosArchivos>1 || $cuantosArchivos=="todos"){$tipoInput="checkbox";}

$archivosL=array();
$archivos=array();	
$sel25 = "SELECT * FROM  cRepositorioArchivos WHERE idFolder='$idFolder' $buscaTipo  ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	
	$idAr= $fila25['id'];
	$archivoInfo= unserialize($fila25['info']);
	
	$archivosL[]=$idAr;
	
	$aleatorio=aleatorio(2);
 
	
	    $fileNombre=$archivoInfo['nombre'];
		$fileExt=$archivoInfo['ext'] ;
		$filePesoV=$archivoInfo['peso'];
		$filePeso=number_format($archivoInfo['peso']/(1024*1024),2);
		$archivos[$idAr.'nombre']=$fileNombre;
		$archivos[$idAr.'peso']=$filePeso;
		$archivos[$idAr.'pesoV']=$filePesoV;
		

		$archivos[$idAr.'fecha']=$archivoInfo['fecha'];
		
		
		
		$imagen="";

		if($fileExt=="mp4" || $fileExt=="webm" ||  $fileExt=="ogg" ){
		$imagen='<img src="'.$url.'/iconos/video.svg" width="20">';
		}

		
		if($fileExt=="txt" || $fileExt=="doc" ||  $fileExt=="docx" ||  $fileExt=="pdf" ||  $fileExt=="ppt" || $fileExt=="pptx" || $fileExt=="xls" || $fileExt=="xlsx" ){
		$imagen='<img src="'.$url.'/iconos/documento.svg" width="20">';
		}
		
		if($fileExt=="zip" || $fileExt=="rar"   ){
		$imagen='<img src="'.$url.'/iconos/zip.svg" width="20">';
		}
		
		
		if($fileExt=="mp3" || $fileExt=="wav"   ){
		$imagen='<img src="'.$url.'/iconos/audio.svg" width="20">';
		}
		
		
		if($fileExt=="jpg" || $fileExt=="jpeg" || $fileExt=="png" || $fileExt=="svg" ){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/t_'.$fileNombre.'?a='.$aleatorio.'"  style="max-height:50px; max-widht:50px;">';
		}
		
			if(  $fileExt=="gif" || $fileExt=="svg"){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$aleatorio.'" width="60">';
		}
		
		$archivos[$idAr.'imagen']=$imagen;
		
		}
		
 
?>
<div id="aqui"></div>


<div class="clear"></div>




<div style="max-height:80vh; overflow:auto; width:100%;">


    <div style="float:left;" id="fotito">
            

           	<? 
			$vieneFiles="Select";
			include $ruta."/_files/files/archivoAdd.php"; ?>

    </div>

<? if ($idAr!=""){ ?>

<table class="tablesorter" id="tablesorter" style=" width:100%;">
    <thead >
    <th style="width: 20px;" data-sorter="false"></th>
    <th data-sorter="false"></th>
    <th >Nombre</th>
    <th>Peso</th>
    <th>Fecha</th>
    
    </thead>
<? foreach($archivosL as $archivin) { 

 
		$fileNombre=$archivos[$archivin.'nombre'];
		$filePeso=$archivos[$archivin.'peso'];
		$filePesoV=$archivos[$archivin.'pesoV'];
		$fileFecha=$archivos[$archivin.'fecha'];
		$imagen=$archivos[$archivin.'imagen'];

?>
<label>
<tr id="linea<?=$archivin?>"> 

<td><input name="seleccionas" class="seleccionas" data-info='<div style="float:left; width:100%; background-image: url(/img/transparente.png?u=59);"><?=$imagen?><br><?=$fileNombre?></div>'  onChange="selectFile('<?=$contenedor?>'); return false;" value="<?=$archivin?>"   type="<?=$tipoInput?>"></td>
<td   style="text-align:center; width:70px; background-image:url(<?=$url?>/img/transparente.png?u=59);"><?=$imagen?> </td>
<td ><?=$fileNombre?></td>
<td><?=$filePeso?>MB</td>
<td><?=$fileFecha?></td>

</tr></label>
<? 	
}
?>

</table>
<? } ?>
</div>

 <div class="div"></div>
 
 <div class="boton" style="display:none;" id="boton_<?=$contenedor?>" onClick="saveSelFile('<?=$contenedor?>'); return false;">
 
 Agregar
 
 </div>


<script>


  tablita();
</script>

