<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="quesos";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM herramientasTags WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
	$img=$fila['img'];
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
<div class="div50">
<form action="tagsAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
  
	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo_es?>" >
  <input type="hidden" id="borraProceso" value="herramientasTags" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
	<div class="clear20"></div>
<? } ?>

	
	
<div class="formaB ">
	<div class="formaT  requerido">Título</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo_es" name="titulo_es" value="<?=$titulo_es?>"> 
	</div>
</div> 



<div class="clear"></div>

	
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


	$tituloC_es=nombreBonito($titulo_es);
	$tituloC_en=nombreBonito($titulo_en);
	 
	$titulo_es=mataMalos($titulo_es);
	$titulo_en=mataMalos($titulo_en);
	
 

if($cambia!=""){
	$query="UPDATE herramientasTags SET  titulo_es='$titulo_es', tituloC_es='$tituloC_es',  titulo_en='$titulo_en', tituloC_en='$tituloC_en',   modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);
$query="INSERT INTO herramientasTags (id,    titulo_es,  tituloC_es, titulo_en,  tituloC_en,       creado) VALUES ('$cambia',     '$titulo_es',  '$tituloC_es',  '$titulo_en',  '$tituloC_en',     '$creado')";
$mysqli->query($query); 
}

 
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_herramientas/tags" ;</script>	
<?
 } ?>