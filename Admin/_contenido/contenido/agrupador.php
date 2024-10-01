<? include "../sesion/arriba.php"; 
extract($_POST);

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

include "../_filesSelect/archivosDisponibles.php"; 
$displa="none";

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];


 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize(base64_decode($fila['parametros']));

	$ancho=$parametros['ancho'];
	$alto=$parametros['alto'];
	$imagen=$parametros['imagen'];
	$color=$parametros['colorFondo'];
	$bg=$parametros['imgContenido'];
	$bgAjuste=$parametros['bgAjuste'];
	$posX=$parametros['posX'];
	$posY=$parametros['posY'];
	$clases=$parametros['clases'];
	
 
	$elArchivo=$arregloArchivos[$bg.'imagen'];
	
	

}
if($color==""){$checkTrans="checked"; $color="#FFFFFF";}
if($imagen=="1"){$displa="";}
	?>
 
 
 <div style="float:left; width:100%; max-width:500px;  ">
 
    <form action="<?=$url?>/_contenido/agrupador.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >



<div class="titulosS">AGRUPADOR</div>
<div style="clear:both; height:10px;"></div>


 
<div style="clear:both; height:10px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Ancho</div>
<div style="float:left;  ">
<select name="ancho" id="ancho">

<option value="75"  >75%</option>
<option value="66.66"  >66%</option>
<option value="50"  >50%</option>
<option value="33.33"  >33%</option>
<option value="25"  >25%</option>
<option value="20"  >20%</option>
<option value="15"  >15%</option>
<option value="10"  >10%</option>
</select>
</div>
<div style="clear:both; height:10px;"></div>

<div style="width:150px; float:left; margin-bottom:5px; ">Márgenes</div>
<div style="float:left;  ">
<input type="checkbox" <?=$pad?> name="padding" /> Padding
<input type="checkbox" <?=$mar?> name="margen" /> Bottom
</div>
<div style="clear:both; height:10px;"></div>



<div class="formaB">
	<div class="formaT">Imagen</div>
    <div class="formaC">
     <select name="imagen" id="imagenV" onChange="llevaImagen(this.value); return false;">
    <option value="">Sin imagen</option>
    <option value="1">Imagen de fondo</option>
    </select>
	</div>
</div>


 <div id="llevaImagen" style="display:<?=$displa?>">


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen de fondo</div>
<div class="formaC">
<?=$elArchivo?>

<div onClick="abreArchivos('imgContenido','uno','img'); return false;" style="cursor:pointer">
         <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$bg?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>
<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>
</div>
</div>

<? /* archivos */ ?>


<div class="formaB">
	<div class="formaT">Ajuste de imagen</div>
    <div class="formaC">
     <select name="bgAjuste" id="bgAjuste">
    <option value="cover"  >Cubrir el 100%</option>
    <option value="contain" >Ajustar imagen</option>
    <option value="repeat">Repetir en ambas direcciones</option>
    <option value="repeat-x">Repetir horizontal</option>
     <option value="repeat-y">Repetir vertical</option>
    </select>
	</div>
</div>



<div class="formaB">
	<div class="formaT">Posición de la imagen</div>
    <div class="formaC">
    
    <div style="float:left; margin-right:5px;">
     <select name="posX" id="posX">
    <option value="center"  >Centrada</option>
    <option value="top"  >Arriba</option>
    <option value="bottom"  >Abajo</option>
     </select>
    </div>
    
    <div style="float:left;">
     <select name="posY" id="posY">
    <option value="center"  >Centrada</option>
    <option value="left"  >Izquierda</option>
    <option value="right"  >Derecha</option>
     </select>
    </div>
    
	</div>
</div>
</div>

 
<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
     <input type="color" name="color" value="<?=$color?>" onChange="cambiaColor();">
    
    <div class="clear"></div>
    <input type="checkbox" <?=$checkTrans?> name="transparente" id="transparente"> Transparent
	</div>
</div>



 
 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field" value="<?=$clases?>">
	</div>
</div>

 
 
 
 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Continuar" />
</div>

</form>
</div>

<? if( $ancho!="" ) { ?>
<script>
$('#ancho').val('<?=$ancho?>');
$('#alto').val('<?=$alto?>');
$('#imagenV').val('<?=$imagen?>');
$('#bgAjuste').val('<?=$bgAjuste?>');
$('#posX').val('<?=$posX?>');
$('#posY').val('<?=$posY?>');

</script>
<? } ?>


<script>

$('#clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$("#forma").validationEngine({autoHidePrompt: true,  autoHideDelay: 3000,   fadeDuration: 0.3}); 
 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$tipoContenido="agrupador";
	
	if($tranparente=="on"){$color="";}
	if($imagen==""){$imgContenido="";}
		
	$parametros=array();
	$parametros['ancho']=mataMalos($ancho);
	$parametros['colorFondo']=mataMalos($color);
	$parametros['imagen']=mataMalos($imagen);
	$parametros['imgContenido']=mataMalos($imgContenido);
	$parametros['bgAjuste']=mataMalos($bgAjuste);
	$parametros['posX']=mataMalos($posX);
	$parametros['posY']=mataMalos($posY);
	$parametros['clases']=mataMalos($clases);
	
	$parametros=base64_encode(serialize($parametros));
	
	
if($cambia!=""){
	
	$query="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query);		
	}
	
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,tipo,parametros) VALUES ('$cambia','$seccion','$padre','$tipoContenido','$parametros')";
	$mysqli->query($query1);
	}
	


?>
 <script>

$('.elementosPonibles').show();


</script>
<?

	
include "acomodo.php";	
}



?>

