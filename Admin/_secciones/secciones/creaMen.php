<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

if($formA!="afecta"){

	?>



<div class="blanco10">
<form action="seccionesAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >



<div class="formaB ">
	<div class="formaT">Tipo</div>
    <div class="formaC">
   <select name="tipo" id="tipo" onChange="tipon(this.value);">
   <option value="pagina">Página</option>
   <option value="contenedor">Contenedor</option>
   </select>
	</div>
</div>

<div class="formaB ">
	<div class="formaT">Activo</div>
    <div class="formaC">
   	<input id="activo"  name="activo" <? if ($activo==1) { ?>checked <? } ?>    type="checkbox" class=" "  value="1" />
	</div>
</div>

<? if($valor!="footer"){ ?> 

<div class="formaB ">
	<div class="formaT">Menu Superior visible</div>
    <div class="formaC">
   	<input id="menuSuperior"  name="menuSuperior" <? if ($menuSuperior==1) { ?>checked <? } ?>    type="checkbox" class=" "  value="1" />
	</div>
</div>


<div class="formaB ">
	<div class="formaT">Menu Lateral visible</div>
    <div class="formaC">
   	<input id="menuLateral"  name="menuLateral" <? if ($menuLateral==1) { ?>checked <? } ?>    type="checkbox" class=" "  value="1" />
	</div>
</div>
<? } ?>

<div class="formaB ">
	<div class="formaT">Título</div>
    <div class="formaC">
   	<input id="titulo_es"  name="titulo_es"    type="text" class="validate[required] field"  value="<?=$titulo_es?>" />
	</div>
</div>

<div class="div100" id="tipines">

<div class="formaB ">
	<div class="formaT">Título inglés</div>
    <div class="formaC">
   	<input id="titulo_en"  name="titulo_en"    type="text" class="validate[required] field"  value="<?=$titulo_en?>" />
	</div>
</div>


<div class="formaB seo">
	<div class="formaT">Título Pestaña</div>
    <div class="formaC">
   	<input id="tituloPagina_es"  name="tituloPagina_es"  type="text" class="validate[required] field"  value="<?=$tituloPagina_es?>" />
	</div>
</div>

<div class="formaB seo">
	<div class="formaT">Título Pestaña inglés</div>
    <div class="formaC">
   	<input id="tituloPagina_en"  name="tituloPagina_en"  type="text" class="validate[required] field"  value="<?=$tituloPagina_en?>" />
	</div>
</div>

<? if($valor!="home"){ ?>

<div class="formaB url">
	<div class="formaT">Url</div>
    <div class="formaC" style="position: relative;">
	<div style="position: absolute; padding: 6px;" id="urlas"> /es/&nbsp;</div>
   	<input id="url_es"  name="url_es"    type="text" class="validate[required] field"  value="<?=$url_es?>" />
	</div>
</div>

<div class="formaB url">
	<div class="formaT">Url inglés</div>
    <div class="formaC" style="position: relative;">
		<div style="position: absolute; padding: 6px;"  > /en/&nbsp; </div>
   	<input id="url_en"  name="url_en"    type="text" class="  field"  value="<?=$url_en?>" />
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
   	<textarea id="metaDes_es"  name="metaDes_es" class="  field"><?=$metaDes_es?></textarea>
	</div>
</div>

<div class="formaB seo">
	<div class="formaT">Keys español</div>
    <div class="formaC">
   	<textarea id="metaKeys_es"  name="metaKeys_es" class="  field"><?=$metaKeys_es?></textarea>
	</div>
</div>



<div class="formaB seo">
	<div class="formaT">Meta Descripción inglés</div>
    <div class="formaC">
   	<textarea id="metaDes_en"  name="metaDes_en" class=" field"><?=$metaDes_en?></textarea>
	</div>
</div>

<div class="formaB seo">
	<div class="formaT">Keys inglés</div>
    <div class="formaC">
   	<textarea id="metaKeys_en"  name="metaKeys_en" class="  field"><?=$metaKeys_en?></textarea>
	</div>
</div>

</div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Guardar cambios" />
</div>

</form>
</div>

<script>

function tipon(cual){

$('#tipines').show();
if(cual=="contenedor"){
$('#tipines').hide();
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

	
	if($menuSuperior==""){$menuSuperior=0;}
	if($menuLateral==""){$menuLateral=0;}
	if($activo==""){$activo=0;}
	
if($cambia!=""){
	
	$query="UPDATE secciones SET tipo='$tipo',  titulo_es='$titulo_es', tituloC_es='$tituloC_es', titulo_en='$titulo_en', tituloC_en='$tituloC_en', tituloPagina_es='$tituloPagina_es', tituloPagina_en='$tituloPagina_en', url_es='$url_es', url_en='$url_en', meta='$meta', modificado='$creado', menuSuperior='$menuSuperior', menuLateral='$menuLateral', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query);

	
}	
if($cambia==""){
$cambia=aleatorio(10);
	
	$query="INSERT INTO secciones (id, tipo, titulo_es, tituloC_es, titulo_en, tituloC_en, tituloPagina_es, tituloPagina_en, url_es, url_en, meta, menuSuperior, menuLateral, activo, creado ) VALUES ('$cambia', '$tipo', '$titulo_es','$tituloC_es','$titulo_en','$tituloC_en', '$tituloPagina_es', '$tituloPagina_en',  '$url_es',  '$url_en',  '$meta', '$menuSuperior','$menuLateral', '$activo', '$creado' )";
 	$mysqli->query($query);

}





	
?>
<script>top.location.href = "<?=$url?>/_secciones/secciones";</script>	
<?
 } ?>