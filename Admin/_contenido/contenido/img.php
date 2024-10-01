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

$paddT=0;
$paddR=0;
$paddB=0;
$paddL=0;

$marginT=0;
$marginB=0;

$anchoPx=0;
$altoPx=0;

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$modificado= unserialize($fila['modificado']);
	$parametros= arregloSaca($fila['parametros']);
	$img=$parametros['img'];
	$imgBorde=$parametros['imgBorde'];
	$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	$ajuste=$parametros['ajusteImg'];
	$margenM=$parametros['margen'];
	$animacionM=$parametros['animacion'];
	$paddingM=$parametros['padding'];
	$ligaTargetM=$parametros['ligaTarget'];
	$flota=$parametros['flota'];
	$clases=$parametros['clases'];
	$porFecha=$parametros['porFecha'];
	$fechaI=$parametros['fechaI'];
	$fechaF=$parametros['fechaF'];
	
	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];	
	
	$altoPx=$parametros['altoPx'];
	$anchoPx=$parametros['anchoPx'];
	
$elArchivo=$arregloArchivos[$img.'imagen'];
}
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	
	?>
 
<div class="div100 divElemento blanco10">  

	
<form action="img.php" method="post" enctype="multipart/form-data" id="forma">
 <input type="hidden" name="formA" value="afecta" >
 <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
 <input type="hidden" name="seccion" value="<?=$seccion?>" >
 <input type="hidden" name="padre" value="<?=$padre?>" >
 <input type="hidden" name="posicion" value="<?=$posicion?>" >

 



<? /* archivos */ ?>



<div class="formaB">
 <div class="formaT">Imagen</div>
<div class="formaC">
<div class="" style="background-image: url(<?=$url?>/img/transparente.png?u=59);">
<?=$elArchivo?>
</div>

<div id="imgContenido"></div>

</div>
</div>
<? /* archivos */ ?>
 




<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('boton');" id="tab-boton" class="elementoTabs">Botón</div>
<div onClick="eleTabs('marco');" id="tab-marco" class="elementoTabs">Marco</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>


<div class="tabsDivs" id="ele-general">

<div class="formaB">
    <div class="formaT">Ajustar</div>
    <div class="formaC">
						<select name="ajuste" id="ajuste" onChange="ajusteImg(this.value);">
								<option value="100">100%</option>
								<option value="max">Tamaño original</option>
								<option value="px">Tamaño fijo px</option>
						</select>
    </div>
</div>


<div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
			
					<div class="left">		
							<select name="ancho" id="ancho">
							</select>
						</div>

					<div class="left padd5" style="display: none;">
						<label  ><input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijoM==1){ ?>checked <? }?> > Ancho Fijo</label>
					</div>
					
			</div>
</div> 
	
<div class="formaB ajustePx oculta">
	<div class="formaT">Medidas Px</div>
    <div class="formaC" style="width: 400px;">
    	<div class="div50 left">Ancho <input type="number" name="anchoPx" id="anchoPx" value="<?=$anchoPx?>"></div>
    	<div class="div50 right">Alto <input type="number" name="altoPx" id="altoPx" value="<?=$altoPx?>"></div>
	</div>
</div>	
	
<div class="formaB">
	<div class="formaT">Alineación</div>
    <div class="formaC">
    <select name="flota" id="flota">
						<option value="left"  > Izquierda </option>
						<option value="right"  > Derecha </option>
				</select>
	</div>
</div>


<div class="formaB">
	<div class="formaT">Efecto</div>
    <div class="formaC">
  	<select name="animacion" id="animacion" class=" ">
	<option value="">Sin animación</option>

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
</div>


<div class="formaB" style="display: none">

	<div class="formaT">Restringir por fecha</div>
    <div class="formaC">
	<div class="left"><input type="checkbox" <? if($porFecha==1) { ?> checked<? } ?> onClick="porFechon();" name="porFecha" value="1"></div>
	<div class="left porFechas" style="width: 150px; display:none;"> <input class="validate[required]" value="<?=$fechaI?>" type="date" id="fechaI" name="fechaI"></div>
	<div class="left porFechas" style="width: 150px; display:none;"><input  class="validate[required]" value="<?=$fechaF?>" type="date" id="fechaF" name="fechaF"></div>
	</div>
</div>


</div>

<div class="oculta tabsDivs" id="ele-boton">



<? foreach($arregloIdiomas as $cod => $idiomin){ 
?>
<div class="formaB">
  <div class="formaT">Link <?=$idiomin?></div>
  <div class="formaC">
  <input type="text" id="liga<?=$cod?>" name="liga<?=$cod?>" class=""   value="<?=$parametros['liga_'.$cod]?>" />
  </div>
</div>
<? } ?>

<div class="formaB">
  <div class="formaT">Destino</div>
  <div class="formaC">
  <select name="ligaTarget" id="ligaTarget">
  <option value="Video">Video</option>
 <option value="_self">Link Misma ventana</option>
  <option value="_blank">Link Nueva ventana</option>
  
  </select>
  </div>
</div>

</div>


<div class="oculta tabsDivs" id="ele-marco">

<div class="formaB">
  <div class="formaT">Estilo</div>
  <div class="formaC">
  <select name="imgBorde" id="imgBorde">
  <option value="">Ninguno</option>
  <option value="imgRedondo">Redondo</option>
  <option value="imgMarco">Una línea</option>
  <option value="imgMarcoD">Dos líneas</option>
  
  </select>
  </div>
</div>

</div>



<div class="oculta tabsDivs" id="ele-medidas">



<div class="div100">

<div class="formaB">
	<div class="formaT">Márgenes internos (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 120px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="paddT" id="paddT" value="<?=$paddT?>"></div>
   <div class="left padd5" style="width: 120px; text-align: center;">Derecho<input type="text" class="entero textAlignCenter" name="paddR" id="paddR" value="<?=$paddR?>"></div>
   <div class="left padd5" style="width: 120px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="paddB" id="paddB" value="<?=$paddB?>"></div>
   <div class="left padd5" style="width: 120px; text-align: center;">Izquierdo<input type="text" class="enter textAlignCenter" name="paddL" id="paddL" value="<?=$paddL?>"></div>
   
   
	</div>
</div>


<div class="formaB">
	<div class="formaT">Márgenes externo (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 120px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 120px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>



</div>



</div>


<? /*
 <div class="formaB">
	<div class="formaT">Márgenes</div>
    <div class="formaC">
    <input type="checkbox" <?=$pad?> name="padding" /> Padding
	<input type="checkbox" <?=$mar?> name="margen" /> Margen
	</div>
</div>
*/ ?>


<div class="oculta tabsDivs" id="ele-estilo">


 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field clases" value="<?=$clases?>">
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Style</div>
    <div class="formaC">
    <input type="text" name="style" id="style" class="field" value="<?=$style?>">
	</div>
</div>

</div>

 <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>

</form>
</div>


<script>

function porFechon(){
$('.porFechas').toggle();
}

<? if($porFecha==1) {  ?>
porFechon();
<?} ?>

$.getScript('elementos.js', function() {
  anchos();

 $( '#imgContenido' ).archivos({
        campo: 'img',
        tipo: 'img',
		cuantos: 1,
		valor:'<?=$img?>'
    });

  

		$('#ligaTarget').val('<?=$ligaTargetM?>');
		ajusteImg('<?=$ajuste?>');
		$('#ajuste').val('<?=$ajuste?>');
<? if( $anchoM>0 ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#estilo').val('<?=$estiloM?>');
$('#flota').val('<?=$flota?>');
$('#imgBorde').val('<?=$imgBorde?>');
<? } ?>

 });
	
</script>
    
 <? }
	
	
if ($formA=="afecta"){
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$padre=mataMalos($padre);
	$tipoContenido="img";
	
		
	$parametros=array();
		$parametros['img']=mataMalos($img);
	foreach($arregloIdiomas as $cod => $idiomin){ 
	
		$parametros['liga_'.$cod]=${'liga'.$cod};
	}
	$parametros['ancho']=mataMalos($ancho);
	$parametros['imgBorde']=$imgBorde;
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	
	
	$parametros['porFecha']=$porFecha;
	$parametros['fechaI']=$fechaI;
	$parametros['fechaF']=$fechaF;
	
	if($ajuste=='px'){
	$parametros['anchoPx']=mataMalos($anchoPx);
	$parametros['altoPx']=mataMalos($altoPx);
	}

	$parametros['ajusteImg']=$ajuste;
	$parametros['animacion']=$animacion;
	$parametros['flota']=$flota;
	$parametros['liga']=mataMalos($liga);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['clases']=$clases;
	$parametros=arregloMete($parametros);
	
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros', modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden, modificado) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100','$creado')";
	$mysqli->query($query1);
	}


?>
<script>
top.location.reload();
</script>
<?
}



?>

