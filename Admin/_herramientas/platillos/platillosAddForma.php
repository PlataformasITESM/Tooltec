<? include "../../sesion/arriba.php"; 
$dondeSeccion="quesos";
include "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM recetasPlatillos WHERE id='$valor'");
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
  <div class="div100">  
<form action="platillosAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div50">


 

 
<div class="formaB ">
	<div class="formaT  requerido">Título</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo_es" name="titulo_es" value="<?=$titulo_es?>"> 
	</div>
</div> 


 
  
   
<div class="formaB ">
	<div class="formaT  requerido">Título Eng</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo_en" name="titulo_en" value="<?=$titulo_en?>"> 
	</div>
</div> 


 
 




</div>

<div class="clear"></div>






 
 
</div>
 

 
 	<input type="hidden" name="borrados" id="borrados">
	
  <div class="formaB concon"  >
	<div class="formaT  ">Imagen  </div>
    <div class="formaC">
	 
	<? if($img!=""){ ?>
	
	<div id="img" class="fotines ui-sortable-handle" style="position: relative;">
 
	<img src="<?=$urlFront?>/recetas/platillos/<?=$valor?>/t_<?=$img?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	</div>
	<div class="clear10"></div>
	<? } ?>
   	<input id="img" data-imgDiv="img"   name="img"  type="file" class="field logos " style="width: auto;"  accept="image/*"  />
	</div>
</div>


 
 
	
	
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
	
$res6 = $mysqli->query("SELECT * FROM recetasPlatillos WHERE id='$cambia'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 
	$img= $fila['img'];
	}

if($cambia!=""){
	$query="UPDATE recetasPlatillos SET  linea='$linea', titulo_es='$titulo_es', tituloC_es='$tituloC_es',  titulo_en='$titulo_en', tituloC_en='$tituloC_en', info='$info', presentaciones='$presentaciones' , modificado='$creado', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);


$query="INSERT INTO recetasPlatillos (id,    titulo_es,  tituloC_es, titulo_en,  tituloC_en,       creado) VALUES ('$cambia',     '$titulo_es',  '$tituloC_es',  '$titulo_en',  '$tituloC_en',     '$creado')";
$mysqli->query($query); 
}

$archivoArchivo='img'; 
$archivoRutas=['/recetas/platillos/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=3;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
 
if($copiado==1){

unlink($rutaServer.'/recetas/platillos/'.$cambia.'/'.$img);
unlink($rutaServer.'/recetas/platillos/'.$cambia.'/t_'.$img);

	$query="UPDATE recetasPlatillos SET  img='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
}
 
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_recetas/platillos" ;</script>	
<?
 } ?>