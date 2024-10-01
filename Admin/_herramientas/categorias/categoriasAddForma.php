<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM herramientasCat WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$titulo_en= $fila['titulo_en'];
	$img=$fila['img'];
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div50">  
<form action="categoriasAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >

	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="herramientasCat" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
	<div class="clear20"></div>
<? } ?>

 

 
<div class="formaB ">
	<div class="formaT  requerido">Título</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo" name="titulo" value="<?=$titulo?>"> 
	</div>
</div> 





<div class="clear"></div>

 

 
 	<input type="hidden" name="borrados" id="borrados">
	

 
 
	
	
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 

</form>
</div>
 
<script type="text/javascript">

 

 </script>
 
 <? } ?>
 
 <? 
if($formA=="afecta"){


$cambia=mataMalos($cambia);


	$tituloC=nombreBonito($titulo);

	$titulo=mataMalos($titulo);
	
$res6 = $mysqli->query("SELECT * FROM herramientasCat WHERE id='$cambia'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 
	$img= $fila['img'];
	}

if($cambia!=""){
	$query="UPDATE herramientasCat SET  titulo='$titulo', tituloC='$tituloC' , modificado='$creado', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);


$query="INSERT INTO herramientasCat (id,  titulo,  tituloC, creado) VALUES ('$cambia', '$titulo',  '$tituloC', '$creado')";
$mysqli->query($query); 
}

$archivoArchivo='img'; 
$archivoRutas=['/herramientas/categorias/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=3;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
 
if($copiado==1){

unlink($rutaServer.'/herramientas/categorias/'.$cambia.'/'.$img);
unlink($rutaServer.'/herramientas/categorias/'.$cambia.'/t_'.$img);

	$query="UPDATE herramientasCat SET  img='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
}
 
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_herramientas/categorias" ;</script>	
<?
 } ?>