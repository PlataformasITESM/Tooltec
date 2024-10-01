<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="blogs";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){
	
include "../../_files/filesSelect/archivosDisponibles.php";
$res6 = $mysqli->query("SELECT * FROM blogs WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$tituloEn= $fila['titulo'];
 
	$experto=$fila['experto'];
	$elArchivo=$arregloArchivos[$img.'imagen'];
	
$img=$fila['img'];
	$imgB=$fila['imgB'];
	
	$elArchivoT=$arregloArchivos[$imgB.'imagen'];
	
	$infoA=arregloSaca($fila['info']);
	$fecha= $fila['fecha'];

	$idSubcat= $fila['categoria'];

 
	//$elArchivo=$arregloArchivos[$img.'imagen'];
	$activo= $fila['activo'];
	
	}
	
  $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="blogAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 


	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="blogs" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>



<form action="blogAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div100">
	
	
<? if($tipoU=="admin"){ ?>
<div class="formaB ">
	<div class="formaT ">Activo</div>
    <div class="formaC">
			<input type="checkbox" value="1" name="activo" <? if ($activo==1) { ?>checked <? } ?>>
			</div>
</div>
<? } ?>

 
<div class="formaB ">
	<div class="formaT  requerido">Título </div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo" name="titulo" value="<?=$titulo?>"> 
	</div>
</div>

<div class="formaB ">
	<div class="formaT  requerido">Subtítulo </div>
    <div class="formaC">
				<textarea id="subTitulo" name="subTitulo"   class="textoEdit"><?=$infoA['subTitulo']?></textarea>
	</div>
</div>
</div>
<div class="formaB ">
	<div class="formaT  requerido">Autor </div>
    <div class="formaC">
	<select name="experto" id="experto" style="width: 250px">
	
	<option value="">Selecciona una opción</option>
	<?
	$res6 = $mysqli->query("SELECT * FROM expertos where muerto='0' ORDER BY titulo_es ASC ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
 
	?>
	<option <? if($experto==$idU) { ?>selected <? } ?>value="<?=$idU?>" ><?=$titulo?></option>
	<?
	}
	?>
	
	</select>
	</div>
</div>


<div class="formaB ">
	<div class="formaT  requerido">Fecha</div>
    <div class="formaC">
	  <input type="date" class="validate[required]" style="width: 150px" id="fechita" name="fecha" value="<?=$fecha?>"> 
	</div>
</div>


<div class="formaB">
	<div class="formaT requerido">Categoria</div>
    <div class="formaC">
	  <select name="categoria" id="categoria" class="validate[required]">
				<option value="" selected disabled>Selecciona una categoria</option>
				<? $res6 = $mysqli->query("SELECT * FROM blogsCat where muerto=0 ORDER BY titulo ASC");
							$res6->data_seek(0);
								while ($fila = $res6->fetch_assoc()) 
								{
								$idC=$fila['id'];
								$laSubcat= $fila['titulo'];
								?>
								<option value="<?=$idC?>"><?=$laSubcat?></option>
								<? } ?>
			</select>
	</div>
</div>

 

<div class="clear"></div>


<div class="formaB ">
	<div class="formaT  requerido">Abstract </div>
    <div class="formaC">
				<textarea id="abstract" name="abstract" rows="4" class="textoEdit"><?=$infoA['abstract']?></textarea>
	</div>
</div>
</div>

 
 
	
<div class="clear"></div>


 
 	<input type="hidden" name="borrados" id="borrados">
	
  <div class="formaB concon"  >
	<div class="formaT  ">Imagen principal</div>
    <div class="formaC">
	 
	<? if($img!=""){ ?>
	
	<div id="img" class="fotines ui-sortable-handle" style="position: relative;">
 
	<img src="/blogs/<?=$valor?>/t_<?=$img?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
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
 
	<img src="<?=$urlFront?>/blogs/<?=$valor?>/t_<?=$imgB?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	</div>
	<div class="clear10"></div>
	<? } ?>
   	<input id="imgB" data-imgDiv="imgB"   name="imgB"  type="file" class="field logos " style="width: auto;"  accept="image/*"  />
	</div>
</div>

	
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 

</form>
</div>
 
<script type="text/javascript">
//estadin();
 <? if($idSubcat!=''){ ?>
	$('#categoria').val('<?=$idSubcat?>').trigger("chosen:updated");
	<? } ?>


CKEDITOR.replace( 'abstract' );
CKEDITOR.replace( 'subTitulo' );
 


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

$tituloC=nombreBonito($titulo);

$titulo=mataMalos($titulo);


$img=mataMalos($imgContenido);

$categoria=mataMalos($categoria);

$info=array();
$info['abstract']=mataMalosTin($abstract);
$info['subTitulo']=mataMalosTin($subTitulo);
$experto=mataMalos($experto);

$info=arregloMete($info);

$modificado=array();
$res6 = $mysqli->query("SELECT * FROM blogs WHERE id='$cambia' ");
$res6->data_seek(0); 
while ($fila = $res6->fetch_assoc()) 
{
	$modificado= unserialize($fila['modificado']);
}


$modificado[$hoy]=$usuarioU;
krsort($modificado);
$modificado=serialize($modificado);



if($cambia!=""){
	$query="UPDATE blogs SET titulo='$titulo', tituloC='$tituloC',  experto='$experto',  info='$info', categoria='$categoria', fecha='$fecha',  modificado='$modificado', activo='$activo' WHERE id='$cambia'";

	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);

$query="INSERT INTO blogs (id, titulo,  tituloC,  categoria, fecha,info, experto,  activo, modificado) VALUES ('$cambia', '$titulo',  '$tituloC', '$categoria','$fecha',  '$info', '$experto', '$activo', '$modificado')";
$mysqli->query($query); 
}

 

$archivoArchivo='img'; 
$archivoRutas=['/blogs/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=5;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
 
if($copiado==1){
	$query="UPDATE blogs SET  img='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
}

$copiado="";
$archivoArchivo='imgB'; 
$archivoRutas=['/blogs/'.$cambia];
$archivoExts=['jpg','jpeg','png','svg'];
$archivoPeso=3;
$archivoName="";
include $ruta."/_api/procesos/archivo.php";
 
if($copiado==1){
	$query="UPDATE blogs SET  imgB='$yosoy' WHERE id='$cambia'";
	$mysqli->query($query);
}


?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_blogs/blogs" ;</script>	
<?
 } ?>