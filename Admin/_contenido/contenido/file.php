<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 


$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';


include "../../_files/filesSelect/archivosDisponibles.php";

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize(base64_decode($fila['parametros']));

	$file=$parametros['file'];
	$icon=$parametros['icon'];
	$texto=$parametros['texto'];
	$textoDownload=$parametros['textoDownload'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	$margenM=$parametros['margen'];
	$animacionM=$parametros['animacion'];
	$paddingM=$parametros['padding'];
	$flota=$parametros['flota'];
	$clases=$parametros['clases'];

	$elArchivo=$arregloArchivos[$file.'imagen'];
	$tipoA=$arregloArchivos[$file.'tipo'];
	$archivoNombre=$arregloArchivos[$file.'nombre'];
	
	$elArchivoI=$arregloArchivos[$icon.'imagen'];
	

	

}
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	
	?>

 <script>
 $('.botonEnviar').show();
 </script>
 <div style="float:left; width:100%; ">
 
    <form action="file.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
	<input type="hidden" name="e" value="<?=$e?>" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >


    
    

<div class="titulosS">Archivo</div>
<div style="clear:both; height:5px;"></div>



<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Archivo</div>
<div class="formaC">


<?=$elArchivo?>
<div class="clear"></div>
<?=$archivoNombre?>

<div class="clear10"></div>

<div onClick="abreArchivos('<?=$e?>','imgContenido','uno','','<?=$seccion?>'); return false;" style="cursor:pointer">

        <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$file?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>



<? /* archivos */ ?>


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Ícono</div>
<div class="formaC">


<?=$elArchivoI?>
<div class="clear10"></div>

<div onClick="abreArchivos('imgContenidoI','uno','img'); return false;" style="cursor:pointer">

        <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenidoI"  name="imgContenidoI"  type="text" class=" " value="<?=$icon?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>

<input id="imgContenidoI_tmp"     type="hidden" value=" "  />
<div id="imgContenidoI_Div"></div>



</div>
</div>



<? /* archivos */ ?>

<div class="formaB">
  <div class="formaT">Texto a mostrar</div>
  <div class="formaC">
  <input type="text" id="texto" name="texto" value="<?=$texto?>" class="validate[required] field">
  </div>
</div>
 

<div class="formaB">
  <div class="formaT">Nombre de descarga<br>
(sin extension)</div>
  <div class="formaC">
  <input type="text" id="textoDownload" name="textoDownload" value="<?=$textoDownload?>" class="validate[required] field">
  </div>
</div>


<div style="clear:both; height:10px;"></div>

 

 <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
    <select name="ancho" id="ancho">
    <option value="100"  >100%</option>
    <option value="75"  >75%</option>
    <option value="66.66"  >66%</option>
    <option value="50"  >50%</option>
    <option value="33.33"  >33%</option>
    <option value="25"  >25%</option>
    <option value="20"  >20%</option>
    <option value="15"  >15%</option>
    <option value="10"  >10%</option>
    </select>
				
				<div class="clear5"></div>
				
				<label><input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijoM==1){ ?>checked <? }?> >	Ancho Fijo</label>
				
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Márgenes</div>
    <div class="formaC">
    <input type="checkbox" <?=$pad?> name="padding" /> Padding
	<input type="checkbox" <?=$mar?> name="margen" /> Ancho
	</div>
</div>

 
 
 <div class="formaB">
	<div class="formaT">Alinación</div>
    <div class="formaC">
    <select name="flota" id="flota">
    <option value="left"  > Izquierda</option>
    <option value="right"  > Derecha  </option>
	</select>
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field clases" value="<?=$clases?>">
	</div>
</div>

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Send" />
</div>

</form>
</div>

<? if( $anchoM>0 ) { ?>
<script>

$('.clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});

$('#ancho').val('<?=$anchoM?>');
$('#estilo').val('<?=$estiloM?>');
$('#ajuste').val('<?=$ajuste?>');
$('#flota').val('<?=$flota?>');
</script>
<? } ?>


<script>

$("#forma").validationEngine({autoHidePrompt: true,  autoHideDelay: 3000,   fadeDuration: 0.3}); 
 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
 
 $('#clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$tipoContenido="file";
	
		
	$parametros=array();
	$parametros['file']=mataMalos($imgContenido);
	$parametros['icon']=mataMalos($imgContenidoI);
	$parametros['ancho']=mataMalos($ancho);
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['flota']=$flota;
	$parametros['textoDownload']=mataMalos($textoDownload);
	$parametros['texto']=mataMalos($texto);
	$parametros['clases']=$clases;
	$parametros=base64_encode(serialize($parametros));
	
	
	
if($cambia!=""){
$query1="UPDATE contenido SET parametros='$parametros' WHERE id='$cambia'";	
$mysqli->query($query1);
}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}


?>
<script>
top.location.reload();
</script>
<?
}



?>

