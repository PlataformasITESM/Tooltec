<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 


$idFolder=limpiaGET($c);
$archivo=limpiaGET($a);


$sel25 = "SELECT * FROM  cRepositorioFolders WHERE id='$idFolder' ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	$idFolder= $fila25['id'];
	$nombre= $fila25['nombre'];
 
}	

$aleatorio=aleatorio(2);
$sel25 = "SELECT * FROM  cRepositorioArchivos WHERE idFolder='$idFolder' AND id='$archivo' ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	
	$idAr= $fila25['id'];
	$fileTipo=$fila25['tipo'];
	$modificado= $fila25['modificado'];
	$archivoInfo= unserialize($fila25['info']);
 
	
	    $fileNombre=$archivoInfo['nombre'];
		
		$fileExt=$archivoInfo['ext'] ;
		$fileFecha=$archivoInfo['fecha'] ;
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
		$imagen='<img src="'.$url.'/iconos/audio.svg" width="20" >';
		}
		
		
		if($fileExt=="jpg" || $fileExt=="jpeg" || $fileExt=="png"  ){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$modificado.'" width="100%" id="target">';
		}
		
			if(  $fileExt=="gif"){
		$imagen='<img src="'.$urlFront.'/contenido/'.$idFolder.'/'.$fileNombre.'?a='.$modificado.'" width="100%" id="target">';
		}
		
		$archivos[$idAr.'imagen']=$imagen;
		
		}
		
		
	
	?>
  <input type="hidden" id="tituloOriginal" value="<?=$nombre?>">
    <div  class="tituloBig" id="tituloFolder" style="width:auto;"><?=$nombre?> / <?=$fileNombre?></div>
     
    <div class="clear10"></div>
    
 <div  style="float:left; cursor:pointer;"   onClick="archivos('<?=$idFolder?>'); return false;" >&lt; regresar al folder</div>
    
    <div class="clear10"></div>
    
 
    
    
    
    <div class="clear"></div>
    
    <div style="float:left;" id="fotito">
            

           	<? include "archivoArchivoAdd.php"; ?>

    </div>
 

	    
	
<div id="aqui"></div>


<div class="clear"></div>
<div class="clear10"></div>


<div class="archivoVista jc-demo-box" style=" float:left; width:400px;   ">
<?=$imagen?>
</div>


 
<div class="clear"></div>


<? if ($fileTipo=="img"){ ?>
 
    <div id="formaCrop" style="float:left;">
     
			 <input type="hidden" name="ar" id="ar" value="<?=$archivo?>"> 
			 <input type="hidden" name="archivo" id="ava" value="<?=$fileNombre?>">
             <input type="hidden" name="folder" id="folder" value="<?=$idFolder?>">
              <input type="hidden" id="x" name="x">
			  <input type="hidden" id="y" name="y">
			  <input type="hidden" id="w" name="w">
			  <input type="hidden" id="h" name="h">
			  <input type="submit" id="submit" class="material-icons" onClick="mandaCropeado(); return false;" value="crop">
       


</div>

<? } ?>

<div class="clear20"></div>

<?=$filePeso?>MB<br>
<?=$fileFecha?><br>
<br>


<?=$urlFront?>/contenido/<?=$idFolder?>/<?=$fileNombre?><br>
<br>

<div class="clear20"></div>
<div class="clear20"></div>


<a href="<?=$urlFront?>/contenido/<?=$idFolder?>/<?=$fileNombre?>" target="_blank">View file on web</a>

<? if ($fileTipo=="img") { ?>
<div id="aquiCropeamos"></div>


<script type="text/javascript">
 function mandaCropeado(){var f=$("#folder").val(),ar=$("#ar").val(),a=$("#ava").val(),e=$("#x").val(),n=$("#y").val(),t=$("#w").val(),i=$("#h").val();""!=e&&""!=n&&""!=a&&$.ajax({type:"POST",url:"crop.php",data:"ar="+ar+"&f="+f+"&ava="+a+"&x="+e+"&y="+n+"&w="+t+"&h="+i,success:function(a){$("#aquiCropeamos").html(a);}})}$(function(a){function e(e){if(parseInt(e.w)>0){var n=v/e.w,r=h/e.h;a("#x").val(e.x),a("#y").val(e.y),a("#w").val(e.w),a("#h").val(e.h),p.css({width:Math.round(n*t)+"px",height:Math.round(r*i)+"px",marginLeft:"-"+Math.round(n*e.x)+"px",marginTop:"-"+Math.round(r*e.y)+"px"})}}var n,t,i,r=a("#preview-pane"),o=a("#preview-pane .preview-container"),p=a("#preview-pane .preview-container img"),v=o.width(),h=o.height();a("#target").Jcrop({setSelect:[0,0,100,100],onChange:e,onSelect:e,bgOpacity:.5,aspectRatio:v/h},function(){var a=this.getBounds();t=a[0],i=a[1],n=this,r.appendTo(n.ui.holder)})});

</script>
<? } ?>
