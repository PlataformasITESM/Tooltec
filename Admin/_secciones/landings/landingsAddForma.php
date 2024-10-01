<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

if($formA!="afecta"){

	?>



<div class="blanco10">
<form action="landingsAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >



<div class="formaB ">
	<div class="formaT">Tipo</div>
    <div class="formaC">
   <select name="tipo" id="tipo" onChange="tipon(this.value);">
   <option value="pagina">Página</option>

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
	<div class="formaT">Header y footer</div>
    <div class="formaC">
   <select name="header" id="header" >
   <option value="0">Header y footer</option>
   <option value="1">Solo header</option>
   <option value="2">Solo footer</option>
	   <option value="3">Nada</option>
   </select>
	</div>
</div>


	
<div class="formaB ">
	<div class="formaT">Ocultar Menu Lateral </div>
    <div class="formaC">
   	<input id="menuIcono"  name="menuIcono" <? if ($menuIcono==1) { ?>checked <? } ?>    type="checkbox" class=" "  value="1" />
	</div>
</div>
	

<div class="formaB ">
	<div class="formaT">Mostrar Menu Lateral Colores</div>
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
		<div style="position: absolute; right: 0; top: 0; padding: 6px;" id="urlas"> /ld</div>
	</div>
</div>

<div class="formaB url">
	<div class="formaT">Url inglés</div>
    <div class="formaC" style="position: relative;">
		<div style="position: absolute; padding: 6px;" id="urlas"> /en/&nbsp;</div>
   	<input id="url_en"  name="url_en"    type="text" class="validate[required] field"  value="<?=$url_en?>" />
	<div style="position: absolute; right: 0; top: 0; padding: 6px;" id="urlas"> /ld</div>
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
$('#header').val('<?=$header?>');
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

	
	if($menuLateral==""){$menuLateral=0;}
	if($menuIcono==""){$menuIcono=0;}
	if($activo==""){$activo=0;}
	if($header==""){$header=0;}
	
if($cambia!=""){
	
	$query="UPDATE landings SET tipo='$tipo',  titulo_es='$titulo_es', tituloC_es='$tituloC_es', titulo_en='$titulo_en', tituloC_en='$tituloC_en', tituloPagina_es='$tituloPagina_es', tituloPagina_en='$tituloPagina_en', url_es='$url_es', url_en='$url_en', meta='$meta', modificado='$creado', menuLateral='$menuLateral',menuIcono='$menuIcono', header='$header', activo='$activo'  WHERE id='$cambia'";
	$mysqli->query($query);

	
}	
if($cambia==""){
$cambia=aleatorio(10);
	
	$query="INSERT INTO landings (id, tipo, titulo_es, tituloC_es, titulo_en, tituloC_en, tituloPagina_es, tituloPagina_en, url_es, url_en, meta, menuLateral, menuIcono, header, activo, creado ) VALUES ('$cambia', '$tipo', '$titulo_es','$tituloC_es','$titulo_en','$tituloC_en', '$tituloPagina_es', '$tituloPagina_en',  '$url_es',  '$url_en',  '$meta', '$menuLateral', '$menuIcono', '$header', '$activo', '$creado' )";
 	$mysqli->query($query);

}





	
?>
<script>top.location.href = "<?=$url?>/_secciones/landings";</script>	
<?
 } ?>