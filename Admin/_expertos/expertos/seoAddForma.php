<? include "../../sesion/arriba.php"; 
$dondeSeccion="quesos";
include "../../sesion/mata.php"; 

if($formA!="afecta"){
	
$res6 = $mysqli->query("SELECT * FROM quesos WHERE id='$valor'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$seo=unserialize($fila['seo']);
	
 
	}



 
 $displa="none";
if($contenido==1){$displa="";}
?>
  <div class="div100">  
<form action="seoAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div50">


<div class="formaB seo">
	<div class="formaT">Título Pestaña</div>
    <div class="formaC">
   	<input id="tituloPagina_es" maxlength="60"  name="tituloPagina_es"  type="text" class="validate[required] field"  value="<?=$seo['tituloPagina_es']?>" />
	</div>
</div>

<div class="formaB seo">
	<div class="formaT">Título Pestaña inglés</div>
    <div class="formaC">
   	<input id="tituloPagina_en"  name="tituloPagina_en"  type="text" class="validate[required] field"  value="<?=$seo['tituloPagina_en']?>" />
	</div>
</div>
 
 


<div class="formaB seo">
	<div class="formaT">Meta Descripción español</div>
    <div class="formaC">
   	<textarea id="metaDes_es" maxlength="150"  name="metaDes_es" class="  field"><?=$seo['metaDes_es']?></textarea>
	</div>
</div>

 


<div class="formaB seo">
	<div class="formaT">Meta Descripción inglés</div>
    <div class="formaC">
   	<textarea id="metaDes_en" maxlength="150"  name="metaDes_en" class=" field"><?=$seo['metaDes_en']?></textarea>
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

$meta=array();
$meta['tituloPagina_es']=mataMalos($tituloPagina_es);
$meta['tituloPagina_en']=mataMalos($tituloPagina_en);
	 
$meta['metaDes_en']=mataMalos($metaDes_en);
$meta['metaDes_es']=mataMalos($metaDes_es);
	 
$meta=serialize($meta);

if($cambia!=""){
	$query="UPDATE quesos SET  seo='$meta'  WHERE id='$cambia'";
	$mysqli->query($query); 
}
 
 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_quesos/quesos/seo.php?u=<?=$cambia?>" ;</script>	
<?
 } ?>