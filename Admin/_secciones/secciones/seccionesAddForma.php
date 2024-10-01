<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

if($tipoU!="admin"){ die(); }

if($formA!="afecta"){

	?>



<div class="blanco10">
<form action="seccionesAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >



<div class="formaB ">
	<div class="formaT">Tipo</div>
    <div class="formaC">
   <select name="tipo" id="tipo" onChange="tipon(this.value);" <? if($tipo=="micro"){ ?> readonly<? } ?>>
   <option value="pagina">Página</option>
   <option value="contenedor">Contenedor</option>
     <option value="micro">Micro sitio</option>
   </select>
	</div>
</div>

<div class="formaB ">
	<div class="formaT">Activo</div>
    <div class="formaC">
   	<input id="activo"  name="activo" <? if ($activo==1) { ?>checked <? } ?>    type="checkbox" class=" "  value="1" />
	</div>
</div>



<div class="formaB ">
	<div class="formaT">Título</div>
    <div class="formaC">
   	<input id="titulo_es"  name="titulo_es"    type="text" class="validate[required] field"  value="<?=$titulo_es?>" />
	</div>
</div>


<div class="div100" id="micrones" style="display: none;">

<div class="div100" id="ulrMicro"></div>

<div class="formaB ">
	<div class="formaT">Header</div>
    <div class="formaC">
   	<select name="header" id="header">
	<option value=""></option>
<? 
$selas="SELECT * FROM microSitios WHERE   idMenu='$valor' and  muerto=0    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$tituloMi= $fila['titulo_es'];
	
	?>
<option <? if($micro['header']==$idU){ ?> selected <? }?> value="<?=$idU?>"><?=$tituloMi?></option>
<?
} ?>
	</select>
	</div>
</div>

<div class="formaB ">
	<div class="formaT">Footer</div>
    <div class="formaC">
   	<select name="footer" id="footer">
	<option value=""></option>
<? 
$selas="SELECT * FROM microSitios WHERE   idMenu='$valor' and  muerto=0    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$tituloMi= $fila['titulo_es'];
	
	?>
<option <? if($micro['footer']==$idU){ ?> selected <? }?> value="<?=$idU?>"><?=$tituloMi?></option>
<?
} ?>
	</select>
	</div>
</div>


</div>


<div class="div100" id="tipines">

 


<div class="formaB seo">
	<div class="formaT">Título Pestaña</div>
    <div class="formaC">
   	<input id="tituloPagina_es" maxlength="60"  name="tituloPagina_es"  type="text" class="validate[required] field"  value="<?=$tituloPagina_es?>" />
	</div>
</div>

 

<? if($valor!="home"){ ?>

<div class="div100" id="ulrNoMicro"></div>

<div class="formaB url" id="urlasT">
	<div class="formaT">Url</div>
    <div class="formaC" style="position: relative;">
	<div style="position: absolute; padding: 6px;" id="urlas"> / &nbsp;</div>
   	<input id="url_es"  name="url_es"    type="text" class="validate[required] field"  value="<?=$url_es?>" />
	</div>
</div>

 
<? } ?>

<script>
var urlAncho=$('#urlas').width()+5;
$('#url_es, #url_en').css('paddingLeft',urlAncho+'px');
</script>



<div class="formaB seo">
	<div class="formaT">Meta Descripción español</div>
    <div class="formaC">
   	<textarea id="metaDes_es" maxlength="150"  name="metaDes_es" class="  field"><?=$metaDes_es?></textarea>
	</div>
</div>

 

 

</div>


<div class="formaB " style="display: none">
	<div class="formaT">Permisos para editores en contenido</div>
    <div class="formaC">
	<table class="tablas">
	<tr>
	<thead>
	<th>Editor</th>
	<th>Crear elementos</th>
	<th>Modificar elementos</th>
	<th>Eliminar  elementos</th>
	<th>Reordenar</th>
	</thead>
	</tr>
	<tbody>
  <?
//print_r($permisos);
 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE tipo='editor' order by nombre asc ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$usus= $fila['id'];
	$nombre= $fila['nombre']." ".$fila['apellido'];
	
	?>
	<tr>
	<td><?=$nombre?></td>
	<td style="text-align: center" ><input type="checkbox" value="1" name="crear<?=$usus?>" <? if($permisos[$usus]['crear']==1) { ?>checked <? } ?>></td>
	<td style="text-align: center" ><input type="checkbox" value="1" name="modificar<?=$usus?>" <? if($permisos[$usus]['modificar']==1) { ?>checked <? } ?>></td>
	<td style="text-align: center" ><input type="checkbox" value="1" name="eliminar<?=$usus?>" <? if($permisos[$usus]['eliminar']==1) { ?>checked <? } ?>></td>
	<td style="text-align: center" ><input type="checkbox" value="1" name="reordenar<?=$usus?>" <? if($permisos[$usus]['reordenar']==1) { ?>checked <? } ?>></td>
	
	</tr>
	<?
	}
	
	?></tbody>
  </table>
	</div>
</div>

<div class="clear20"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Guardar cambios" />
</div>

</form>
</div>

<script>

function tipon(cual){

$('#tipines').show();
$('#micrones').hide();
$('#urlasT').appendTo('#ulrNoMicro');
if(cual=="contenedor" || cual=="micro"){
$('#tipines').hide();
}
if(cual=="micro"){
$('#micrones').show();
$('#urlasT').appendTo('#ulrMicro');
}
}

<? if($tipo!=""){ ?>

$('#tipo').val('<?=$tipo?>');
tipon('<?=$tipo?>');
<? } ?>
</script>

<? } ?>
 
 <? 
 if($formA=="afecta"){
	 
	 $cambia=mataMalos($cambia);
	 $titulo=mataMalos($titulo);
	 $tipo=mataMalos($tipo);
	 
	 $titulo_es=mataMalos($titulo_es);
	 $titulo_en=mataMalos($titulo_en);
	

	 $tituloC_es=nombreBonito($titulo_es);
	 $tituloC_en=nombreBonito($titulo_en);


	 $tituloPagina_es=mataMalos($tituloPagina_es);
	 $tituloPagina_en=mataMalos($tituloPagina_en);
	 
		 
	 $url_es=nombreBonito($url_es);
	 $url_en=nombreBonito($url_en);

	 $meta=array();
	 
	 $meta['metaDes_en']=$metaDes_en;
	 $meta['metaDes_es']=$metaDes_es;
	 
	 $meta['metaKeys_en']=$metaKeys_en;
	 $meta['metaKeys_es']=$metaKeys_es;
	 
	 $meta=arregloMete($meta);


if($tipo=="micro"){
$micro=array();
$micro['header']=$header;
$micro['footer']=$footer;
$micro=serialize($micro);
}
	
	if($menuSuperior==""){$menuSuperior=0;}
	if($menuLateral==""){$menuLateral=0;}
	if($activo==""){$activo=0;}
	
	
	$permisos=array();
	
 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE tipo='editor' order by nombre asc ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$usus= $fila['id'];
	$crear=${'crear'.$usus};
	$modificar=${'modificar'.$usus};
	$eliminar=${'eliminar'.$usus};
	$reordenar=${'reordenar'.$usus};
	
	if($crear==1){$permisos[$usus]['crear']=$crear;}
	if($modificar==1){$permisos[$usus]['modificar']=$modificar;}
	if($eliminar==1){$permisos[$usus]['eliminar']=$eliminar;}
	if($reordenar==1){$permisos[$usus]['reordenar']=$reordenar;}
	}

if($permisos!=""){
$permisos=serialize($permisos);
}else {$permisos="";}
	
if($cambia!=""){
	
	$query="UPDATE secciones SET tipo='$tipo', micro='$micro', permisos='$permisos',  titulo_es='$titulo_es', tituloC_es='$tituloC_es', titulo_en='$titulo_en', tituloC_en='$tituloC_en', tituloPagina_es='$tituloPagina_es', tituloPagina_en='$tituloPagina_en', url_es='$url_es', url_en='$url_en', meta='$meta', modificado='$creado', menuSuperior='$menuSuperior', menuLateral='$menuLateral', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query);
	
	
	
	$query="UPDATE microSitios SET  permisos='$permisos'  WHERE idMenu='$cambia'";
	$mysqli->query($query);
	$query="UPDATE microSitios SET  footer='1'  WHERE id='$header'";
	$mysqli->query($query);
	$query="UPDATE microSitios SET  footer='2'  WHERE id='$footer'";
	$mysqli->query($query);

 
}	
if($cambia==""){
$cambia=aleatorio(10);
	
	$query="INSERT INTO secciones (id, tipo, permisos, titulo_es, tituloC_es, titulo_en, tituloC_en, tituloPagina_es, tituloPagina_en, url_es, url_en, meta, menuSuperior, menuLateral, activo, creado ) VALUES ('$cambia', '$tipo', '$permisos', '$titulo_es','$tituloC_es','$titulo_en','$tituloC_en', '$tituloPagina_es', '$tituloPagina_en',  '$url_es',  '$url_en',  '$meta', '$menuSuperior','$menuLateral', '$activo', '$creado' )";
 	$mysqli->query($query);

}



 

	
?>
<script>top.location.href = "<?=$url?>/_secciones/secciones";</script>	
<?
 } ?>