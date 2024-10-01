<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 


$idFolder=limpiaGET($c);


$sel25 = "SELECT * FROM  cRepositorioFolders WHERE id='$idFolder' ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	$idFolder= $fila25['id'];
	$nombre= $fila25['nombre'];
	
 
}	
	
	?>
  <input type="hidden" id="tituloOriginal" value="<?=$nombre?>">
    <div  class="tituloBig" id="tituloFolder" style="width:auto;"><?=$nombre?></div>
    <div onClick="tituloEdit(); return false;" class="edit opacity material-icons" style=" float:left; margin-left:10px; cursor:pointer;">create</div>
    
    
    
    <div style="float:left; margin-left:10px; display:none;" id="titulosControl">
    <div onClick="tituloSave(); return false;" class="  opacity material-icons" style=" float:left; margin-left:10px; cursor:pointer;">check</div>
    <div onClick="tituloCancel(); return false;" class="  opacity material-icons" style=" float:left; margin-left:10px; cursor:pointer;">cancel</div>
    
    </div>
    
    
    
    <div class="clear5"></div>
    
    <div style="float:left;" id="fotito">
            

           	<? include "archivoAdd.php"; ?>

    </div>
 

	
    
	<?
$archivosL=array();
$archivos=array();	
$sel25 = "SELECT * FROM  cRepositorioArchivos WHERE idFolder='$idFolder' ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	
	$idAr= $fila25['id'];
	$modificado= $fila25['modificado'];
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
		
		
		if($fileExt=="jpg" || $fileExt=="jpeg" || $fileExt=="png"   ){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/t_'.$fileNombre.'?a='.$modificado.'" style="max-height:60px; max-width:60px">';
		}
		
 
		
		
		if(  $fileExt=="gif" || $fileExt=="svg"){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$modificado.'" style="max-height:60px; max-width:60px">';
		}
		
		
		$archivos[$idAr.'imagen']=$imagen;
		
		}
		
 
?>
<div id="aqui"></div>


<div class="clear"></div>
<div class="clear10"></div>
<div style="float:left;color:#f00; display:none;" id="eliminar" >

<a  class="borra"    onclick="eliminarArchivosAlert();return false;">
   <div class="material-icons" style="float:left; margin-right:3px; ">delete_forever</div> <div style="float:left; line-height:30px;">Borrar los archivos seleccionados</div>
    </a>


</div>

<div style=" float:right;">

<a class="borra"     onclick="eliminarCarpetaAlert();return false;">
   <div class="material-icons" style="float:left; margin-right:3px; ">delete_forever</div> <div style="float:left; line-height:30px;">Borrar carpeta</div>
    </a>

</div>

<div class="clear10"></div>
 <input type="hidden" id="eliminarListado" />
  <input type="hidden" id="eliminarListadoN" />
 <input type="hidden" id="c" value="<?=$idFolder?>" />
 <input type="hidden" id="p" />


<? if ($idAr!=""){ ?>




<table class="tablesorter" id="tablesorter" style="min-width:400px;">
    <thead >
    <th data-sorter="false"></th>
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

<tr id="linea<?=$archivin?>"> 
<td><input name="eliminas" class="eliminas" data-peso="<?=$filePesoV?>"  data-nombre="<?=$fileNombre?>"  onChange="eliminas(); return false;" value="<?=$archivin?>"   type="checkbox"></td>
<td   onClick="modArchivo('<?=$idFolder?>','<?=$archivin?>'); return false;" style="text-align:center;cursor:pointer; background-image: url(<?=$url?>/img/transparente.png)"><?=$imagen?> </td>
<td style="cursor:pointer;" onClick="modArchivo('<?=$idFolder?>','<?=$archivin?>'); return false;"><?=$fileNombre?></td>
<td><?=$filePeso?>MB</td>
<td><?=$fileFecha?></td>
</tr>
<? 	
}
?>

</table>

<script>
  tablita();




</script>

<? } ?>