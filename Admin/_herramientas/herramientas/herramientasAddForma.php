<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM herramientas WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
	
	$titulo_en= $fila['titulo_en'];
	$img=$fila['img'];
	$imgB=$fila['imgB'];

	
	
	$infoA=unserialize($fila['info']);


 
	//$elArchivo=$arregloArchivos[$img.'imagen'];
	$activo= $fila['activo'];
	
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="herramientasAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 


	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="herramientas" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<? } ?>

 


<div class="formaB ">
	<div class="formaT ">Activa</div>
    <div class="formaC">
			<input type="checkbox" value="1" name="activo" <? if ($activo==1) { ?>checked <? } ?>>
			</div>
</div>

 
 
<div class="formaB ">
	<div class="formaT  requerido">Título</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo_es" name="titulo_es" value="<?=$titulo_es?>"> 
	</div>
</div> 

<div class="formaB ">
	<div class="formaT  requerido">Abstract</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="abstractC" name="abstractC" value="<?=$infoA['abstractC']?>"> 
	</div>
</div> 


<div class="formaB ">
<div class="formaT  requerido">¿Qué es? </div>
   <div class="formaC">
<textarea id="abstract" name="abstract" rows="4" class="textoEdit"><?=$infoA['abstract']?></textarea>
</div>
</div>

<div class="formaB ">
	<div class="formaT  requerido">¿Cuándo usar?</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="cuandoUsar" name="cuandoUsar" value="<?=$infoA['cuandoUsar']?>"> 
	</div>
</div> 

 

<div class="formaB ">
	<div class="formaT  requerido">Nivel de dificultad</div>
    <div class="formaC">
	<div class="left">
	 <select name="dificultad" id="dificultad" class="validate[required]" >
	 <option value="1">Bajo</option>
	 <option value="2">Medio</option>
	 <option value="3">Alto</option>
	 </select>
	 
 
	  </div>
	</div>
</div> 
<div class="formaB ">
	<div class="formaT requerido  ">Tiempo <br>
 recomendado</div>
    <div class="formaC">
	
	  <input type="text"  id="tiempo" name="tiempo" value="<?=$infoA['tiempo']?>" class="validate[required]" > 
	  
	
	</div>
</div> 





<div class="formaB ">
	<div class="formaT  ">Consideraciones</div>
    <div class="formaC">
	
	  <input type="text" class="" id="consideraciones" name="consideraciones" value="<?=$infoA['consideraciones']?>"> 

	  
	</div>
</div> 


<div class="clear"></div>


 
 	<input type="hidden" name="borrados" id="borrados">
	
  <div class="formaB concon"  >
	<div class="formaT  ">Imagen principal</div>
    <div class="formaC">
	 
	<? if($img!=""){ ?>
	
	<div id="img" class="fotines ui-sortable-handle" style="position: relative;">
 
	<img src="<?=$urlFront?>/herramientas/<?=$valor?>/t_<?=$img?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	</div>
	<div class="clear10"></div>
	<? } ?>
   	<input id="img" data-imgDiv="img"   name="img"  type="file" class="field logos " style="width: auto;"  accept="image/*"  />
	</div>
</div>


  <div class="formaB concon"  >
	<div class="formaT  ">Imagen Banner</div>
    <div class="formaC">
	 
	<? if($imgB!=""){ ?>
	
	<div id="img" class="fotines ui-sortable-handle" style="position: relative;">
 
	<img src="<?=$urlFront?>/herramientas/<?=$valor?>/t_<?=$imgB?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	</div>
	<div class="clear10"></div>
	<? } ?>
   	<input id="imgB" data-imgDiv="imgB"   name="imgB"  type="file" class="field logos " style="width: auto;"  accept="image/*"  />
	</div>
</div>

 
	
	
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Guardar" />
</div>
 

</form>
</div>
 
<script type="text/javascript">

 <? if($valor!=""){ ?>
 $('#dificultad').val('<?=$infoA['dificultad']?>');
 <? } ?>

	

CKEDITOR.replace( 'abstract' );
function CKupdate(){
   for ( instance in CKEDITOR.instances )
       CKEDITOR.instances[instance].updateElement();
}

$(".botonEnviar").click(function() {
     
  CKupdate();
       
});
	
 </script>
 
 <? } ?>
 
 <? 
if($formA=="afecta"){


$cambia=mataMalos($cambia);

	$tituloC_es=nombreBonito($titulo_es);
	 
	$titulo_es=mataMalos($titulo_es);

$info=array();


$info['abstract']=mataMalosTin($abstract);
$info['abstractC']=mataMalos($abstractC);
$info['cuandoUsar']=mataMalos($cuandoUsar);

$info['tiempo']=mataMalos($tiempo);
$info['dificultad']=mataMalos($dificultad);
$info['consideraciones']=mataMalos($consideraciones);



$info=serialize($info);


if($cambia!=""){
	$query="UPDATE herramientas SET   titulo_es='$titulo_es', tituloC_es='$tituloC_es',  titulo_en='$titulo_en', tituloC_en='$tituloC_en', info='$info',   modificado='$creado', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){

$va=0;
$res6 = $mysqli->query("SELECT * FROM herramientas where muerto='0' ORDER BY orden desc limit 1 ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$va= $fila['orden'];
	}
$va=$va+1;


$cambia=aleatorio(10);
$query="INSERT INTO herramientas (id,  titulo_es,  tituloC_es,   info,   activo, orden,  creado) VALUES ('$cambia',  '$titulo_es',  '$tituloC_es',  '$info',  '$activo', '$va', '$creado')";
$mysqli->query($query); 
}

$archivoArchivo='img'; 
$archivoRutas=['/herramientas/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=3;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
 
if($copiado==1){

unlink($rutaServer.'/herramientas/'.$cambia.'/'.$img);
unlink($rutaServer.'/herramientas/'.$cambia.'/t_'.$img);

	$query="UPDATE herramientas SET  img='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
}

$archivoArchivo='imgB'; 
$archivoRutas=['/herramientas/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=3;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
if($copiado==1){
	$query="UPDATE herramientas SET  imgB='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
	unlink($rutaServer.'/herramientas/'.$cambia.'/'.$imgB);
	unlink($rutaServer.'/herramientas/'.$cambia.'/t_'.$imgB);
}

$query="INSERT INTO cRepositorioFolders ( id,nombre, tipo ) VALUES ( '$cambia','$titulo_es','herramientas')";
$mysqli->query($query);
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_herramientas/herramientas/herramientasAdd.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>