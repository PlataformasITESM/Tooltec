<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){


	?>

<div class="div100">

<form action="descargasAddForma.php" method="post" enctype="multipart/form-data" id="forma">

  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$des?>" >
	<input type="hidden" name="her" value="<?=$valor?>" >
				    


	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="herramientasDescargas" >
  <input type="hidden" id="borraBorrado" value="<?=$des?>" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>

		
 <div class="formaB">
	<div class="formaT requerido">Título</div>
    <div class="formaC">
   	<input id="titulo"  name="titulo"  type="text" class="validate[required] field"  value="<?=$titulo?>" />
	</div>
</div>


 <div class="formaB">
	<div class="formaT requerido">Archivo</div>
    <div class="formaC">
	png, jpg, jpeg, pdf, zip 10 mb max
	<div class="clear"></div>
	<div class="clear10"></div>
	<? if($img!=""){ ?>
		<input type="hidden" name="borrado" value="<?=$img?>">
 <div class="clear20"></div>
	<a style="color: darkcyan" href="<?=$urlFront?>/herramientas/<?=$valor?>/<?=$img?>" target="_blank"><?=$info['name']?>.<?=$ext?></a>
	 
	
	<div class="clear10"></div>
	<? } ?>
   	<input id="img"    name="img"  type="file" class="field logosD"   style="width: auto;"    />
	</div>
</div>
 

<div  style="float:right;">

<input class="botonEnviar"  type="submit" value="Enviar" />

</div>

</form>

</div>


<script>

 $(".botonEnviar").click(function() {        
});

$('#tituloHerramienta').html('<?=$nombreM?>')


 </script>

 <? } ?>

 

  <? 
 if($formA=="afecta"){
$categoria=mataMalos($categoria);
$des=mataMalos($des);
$cambia=mataMalos($cambia);
 
$titulo=mataMalos($titulo);
$tituloC=nombreBonito($titulo);

if($cambia!=""){
	$query="UPDATE herramientasDescargas SET   titulo='$titulo', modificado='$modificado' WHERE id='$cambia'";
	$mysqli->query($query);
}

if($cambia==""){
	
	$cambia=aleatorio(10);
	$query="INSERT INTO herramientasDescargas (id, idHerramienta, titulo, creado) VALUES ('$cambia', '$her', '$titulo', '$creado')";
	$mysqli->query($query);
			 
}
//copia archivo
$archivoArchivo='img'; 
$archivoRutas=['/herramientas/'.$her];
$archivoExts=['png','jpg','jpeg','pdf','zip'];
$archivoPeso=10;
//$archivoName=$cambia;
include $ruta."/_api/procesos/archivo.php";

if($copiado==1){
$info=array();
$info['name']=mataMalos($name);
$info['peso']=mataMalos($peso);
$info=serialize($info);
$query="UPDATE herramientasDescargas SET  img='$yosoy', ext='$ext', info='$info' WHERE id='$cambia'";
$mysqli->query($query);
	
unlink($rutaServer.'/herramientas/'.$her.'/'.$borrado);
	unlink($rutaServer.'/herramientas/'.$her.'/t_'.$borrado);
}
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "descargas?u=<?=$her?>";</script>	
</script>	
<?
 } ?>