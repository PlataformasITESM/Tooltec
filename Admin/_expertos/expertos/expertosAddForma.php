<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM expertos WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
	
	$contenido= $fila['contenido'];
$fechaI= $fila['fechaI'];	
	$fechaF= $fila['fechaF'];
	$linea= $fila['linea'];
	$tipo= $fila['tipo'];
	$img=$fila['img'];
	
	
	$infoA=unserialize($fila['info']);
	$fechita= $fila['fecha'];

	$idSubcat= $fila['categoria'];

 
	//$elArchivo=$arregloArchivos[$img.'imagen'];
	$activo= $fila['activo'];
	
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="expertosAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 


	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="expertos" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>

 


<div class="formaB ">
	<div class="formaT ">Activo</div>
    <div class="formaC">
			<input type="checkbox" value="1" name="activo" <? if ($activo==1) { ?>checked <? } ?>>
			</div>
</div>

 
 
<div class="formaB ">
	<div class="formaT  requerido">Nombre</div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo_es" name="titulo_es" value="<?=$titulo_es?>"> 
	</div>
</div> 


<div class="formaB ">
<div class="formaT  requerido">Ciudad</div>
   <div class="formaC">
<input type="text" class="validate[required]" id="ciudad" name="ciudad" value="<?=$infoA['ciudad']?>">
</div>
</div>
	
<div class="formaB ">
<div class="formaT  requerido">Abstract </div>
   <div class="formaC">
<textarea id="abstract" name="abstract" rows="2" class="textoEdit"  maxlength="200"><?=$infoA['abstract']?></textarea>
</div>
</div>
	
	<div class="formaB ">
<div class="formaT  requerido">Acerca de </div>
   <div class="formaC">
<textarea id="acerca" name="acerca" rows="4" class=""><?=$infoA['acerca']?></textarea>
</div>
</div>


<div class="formaB ">
<div class="formaT "><strong>Redes Sociales</strong> </div>
</div>
	
<div class="formaB ">
	<div class="formaT  ">Linked in</div>
    <div class="formaC">
	
	 <input type="text" class="" id="linkedin" name="linkedin" value="<?=$infoA['redes']['linkedin']?>"> 

	  
	</div>
</div> 
	
	<div class="formaB ">
	<div class="formaT  ">Facebook</div>
    <div class="formaC">
	
	 <input type="text" class="" id="facebook" name="facebook" value="<?=$infoA['redes']['facebook']?>">  

	  
	</div>
</div> 
	
	<div class="formaB ">
	<div class="formaT  ">Twitter</div>
    <div class="formaC">
	
	<input type="text" class="" id="twitter" name="twitter" value="<?=$infoA['redes']['twitter']?>">  

	  
	</div>
</div> 

<div class="formaB ">
	<div class="formaT  ">Instagram</div>
    <div class="formaC">
	
	<input type="text" class="" id="instagram" name="instagram" value="<?=$infoA['redes']['instagram']?>">  

	  
	</div>
</div> 



<div class="clear"></div>



 
	
	
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

	

CKEDITOR.replace( 'acerca' );
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
$info['ciudad']=mataMalos($ciudad);
$info['abstract']=mataMalos($abstract);
$info['acerca']=mataMalosTin($acerca);
$info['redes']['linkedin']=mataMalos($linkedin);
$info['redes']['facebook']=mataMalos($facebook);
$info['redes']['instagram']=mataMalos($instagram);
$info['redes']['twitter']=mataMalos($twitter);



$info=serialize($info);


if($cambia!=""){
	$query="UPDATE expertos SET  titulo_es='$titulo_es', tituloC_es='$tituloC_es',   info='$info',   modificado='$creado', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$va=0;
$res6 = $mysqli->query("SELECT * FROM expertos where muerto='0' ORDER BY orden desc limit 1 ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$va= $fila['orden'];
	}
$va=$va+1;



$cambia=aleatorio(10);
$query="INSERT INTO expertos (id,  titulo_es,  tituloC_es,   info,   activo, orden,  creado) VALUES ('$cambia',  '$titulo_es',  '$tituloC_es',  '$info',  '$activo', '$va', '$creado')";
$mysqli->query($query); 
}


$query="INSERT INTO cRepositorioFolders ( id,nombre, tipo ) VALUES ( '$cambia','$titulo_es','expertos')";
$mysqli->query($query);
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_expertos/expertos/expertosAdd.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>