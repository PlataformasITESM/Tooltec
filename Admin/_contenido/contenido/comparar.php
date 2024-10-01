<? include "../sesion/arriba.php"; 
extract($_POST);

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';

include "../_filesSelect/archivosDisponibles.php";

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize($fila['parametros']);

	$img=$parametros['img'];
	$img2=$parametros['img2'];
	$tituloM=$parametros['titulo'];
	$colorFondoM=$parametros['colorFondo'];
	$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	$margenM=$parametros['margen'];
	$ligaM=$parametros['liga'];
	$ligaTargetM=$parametros['ligaTarget'];
	$animacionM=$parametros['animacion'];
	$paddingM=$parametros['padding'];
	
	$estiloM=$parametros['estilo'];
	
$elArchivo=$arregloArchivos[$img.'imagen'];
$elArchivo2=$arregloArchivos[$img2.'imagen'];
	

}
if($colorFondoM==""){$colorFondoM="#FFFFFF";}		
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	


	?>
  <script type="text/javascript" src="<?=$url?>/_contenido/imgJs.php"></script>  
 <script>
 $('.botonEnviar').show();
 </script>
 <div style="float:left; width:100%;  ">
 
    <form action="<?=$url?>/_contenido/comparar.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
     <input type="hidden" name="borra" value="<?=$img?>" >

    
    

<div class="titulosS">Comparar imágenes</div>
<div style="clear:both; height:5px;"></div>



<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen Antes</div>
<div class="formaC">


<?=$elArchivo?>

<div onClick="abreArchivos('imgContenido','uno','img'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC"><img src="<?=$url?>/iconos/file.svg" height="20"  ></div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$img?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>



<div class="archivosSeleccion" id="seleccion_imgContenido">
<div class="closeSeleccion"  onClick="closeAlert('imgContenido'); return false;">X</div>
<div class="archivosSeleccionArchivos" id="archivos_imgContenido">
</div>
</div>
<? /* archivos */ ?>


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen Después</div>
<div class="formaC">


<?=$elArchivo2?>

<div onClick="abreArchivos('imgContenido2','uno','img'); return false;" style="cursor:pointer">

         <div class="seccionMenuI" >
       	<div class="seccionMenuC"><img src="<?=$url?>/iconos/file.svg" height="20"  ></div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido2"  name="imgContenido2"  type="text" class="validate[required]" value="<?=$img2?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenido2_tmp"     type="hidden" value=" "  />
<div id="imgContenido2_Div"></div>



</div>
</div>



<div class="archivosSeleccion" id="seleccion_imgContenido2">
<div class="closeSeleccion"  onClick="closeAlert('imgContenido2'); return false;">X</div>
<div class="archivosSeleccionArchivos" id="archivos_imgContenido2">
</div>
</div>
<? /* archivos */ ?>



 
  




<div style="width:150px; float:left; margin-bottom:5px; ">Width</div>
<div style="float:left;  ">
<select name="ancho" id="ancho">
<option value="100"  >100%</option>
<option value="75"  >75%</option>
<option value="66.66"  >66%</option>
<option value="50"  >50%</option>
<option value="33.33"  >33%</option>
<option value="25"  >25%</option><option value="20"  >20%</option><option value="15"  >15%</option><option value="10"  >10%</option>
</select>
</div>
<div style="clear:both; height:10px;"></div>



<div style="width:150px; float:left; margin-bottom:5px; ">Márgenes</div>
<div style="float:left;  ">
<input type="checkbox" <?=$pad?> name="padding" /> Padding
<input type="checkbox" <?=$mar?> name="margen" /> Bottom
</div>
<div style="clear:both; height:10px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Efecto</div>
<div style="float:left;  ">
<select name="animacion" id="animacion" class=" ">
<option value=""  >Sin animación</option>
<?

$res6 = $mysqli->query("SELECT * FROM animaciones   ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$animacion= $fila['animacion'];

?>
<option value="<?=$animacion?>"><?=$animacion?></option>
<?
	}
?>

</select>
</div>
<div style="clear:both; height:10px;"></div>
 

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Continuar" />
</div>

</form>
</div>
<? if( $anchoM>0 ) { ?>
<script>
$('#ancho').val('<?=$anchoM?>');
$('#estilo').val('<?=$estiloM?>');
$('#animacion').val('<?=$animacionM?>');
</script>
<? } ?>

<script>
 
$("#forma").validationEngine(); 
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
	$tipoContenido="comparar";
	

	
	$parametros['img']=mataMalos($imgContenido);
	$parametros['img2']=mataMalos($imgContenido2);
	$parametros['titulo']=mataMalosTin($titulo);
	$parametros['texto']=mataMalosTin($texto);
	$parametros['colorFondo']=mataMalos($colorFondo);
	$parametros['ancho']=mataMalos($ancho);
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['liga']=mataMalos($liga);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['estilo']=mataMalos($estilo);
	$parametros=base64_encode(serialize($parametros));
	
	
	
	if($cambia!=""){
		
	$query1="UPDATE contenido SET parametros='$parametros' WHERE id='$cambia'";	
$mysqli->query($query1);	
	}
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre,'$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}


	 
 

	
	   


	
include "acomodo.php";	
}



?>

