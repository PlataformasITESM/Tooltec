<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 


$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';

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

$imgAlto=100;
include "../../_files/filesSelect/archivosDisponibles.php";

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
$modificado= unserialize($fila['modificado']);
	$img=$parametros['img'];
	$tituloM=$parametros['titulo'];
	$colorFondo=$parametros['colorFondo'];
	$textoM=$parametros['texto'];
	$traduccionA=$parametros['traduccion'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	$tituloLiga=$parametros['tituloLiga'];
	$ligaM=$parametros['liga'];
	$ligaTargetM=$parametros['ligaTarget'];
	$animacionM=$parametros['animacion'];
	$flota=$parametros['flota'];
	
	
	$imgAlto=$parametros['imgAlto'];
	$imgAltoUnidades=$parametros['imgAltoUnidades'];
	$bgAjuste=$parametros['bgAjuste'];
	$posX=$parametros['posX'];
	$posY=$parametros['posY'];
	
	$colImgContenido=$parametros['imgContenido'];
	
	$clases=$parametros['clases'];
	$clasesI=$parametros['clasesI'];
	$clasesT=$parametros['clasesT'];
	$clasesTit=$parametros['clasesTit'];
	$clasesL=$parametros['clasesL'];
	$style=$parametros['style'];
	
	
	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];
	
	$textoPre=$parametros['textoPre'];
	$tituloPre=$parametros['tituloPre'];
	
	$estiloM=$parametros['estiloTextoImagen'];
	
$elArchivo=$arregloArchivos[$img.'imagen'];
	

}
 	
	
if($apareceM=="on"){$apa="checked"; }	

	?>
 
<div class="div100 divElemento blanco10">  

		
<form action="textoImagen.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
	 <input type="hidden" name="e" value="<?=$e?>" >
  <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
  <input type="hidden" name="seccion" value="<?=$seccion?>" >
  <input type="hidden" name="padre" value="<?=$padre?>" >
  <input type="hidden" name="posicion" value="<?=$posicion?>" >

    


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen</div>
<div class="formaC">
<div class="" style="background-image: url(/Admin/img/transparente.png?u=59);">
<?=$elArchivo?>
</div>

<div id="imgContenido"></div>

</div>
</div>
<? /* archivos */ ?>


<div class="formaB">
	<div class="formaT">Ajuste</div>
    <div class="formaC">

	<div class="left" style="  margin-right:5px;">
	<div class="left"  style="  margin-right:5px;">
	Altura
	</div>
	<div class="left" style=" text-align: right; width: 60px; margin-right:5px;">
    <input type="number" id="imgAlto" name="imgAlto" value=<?=$imgAlto?> style="text-align:right;">
	</div>
	<div class="left" style="margin-right: 5px;">
	<select name="imgAltoUnidades" id="imgAltoUnidades" style="background-color: #FFF; border: none;">
	<option value="%">%</option>
	<option <? if($imgAltoUnidades=="px") { ?>selected <? } ?> value="px">px</option>
	</select>
    </div>
	</div>


	<div style="float:left; margin-right:5px;">
	 <select name="bgAjuste" id="bgAjuste">
    <option value="cover"  >Cubrir 100%</option>
    <option value="contain" >Ajustar imagen</option>
    <option value="repeat">Repetir </option>
    <option value="repeat-x">Repetir horizontal</option>
     <option value="repeat-y">Repetir vertical</option>
	 <option value="no-repeat">No repetir</option>
    </select>
	</div>
    
    <div style="float:left; margin-right:5px;">
     <select name="posX" id="posX">
    <option value="center"  >Centro</option>
    <option value="top"  >Arriba</option>
    <option value="bottom"  >Abajo</option>
     </select>
    </div>
    
    <div style="float:left;">
     <select name="posY" id="posY">
    <option value="center"  >Centro</option>
    <option value="left"  >Izquierda</option>
    <option value="right"  >Derecha</option>
     </select>
    </div>
    
	</div>
</div>




<div class="formaB">
	<div class="formaT">Título</div>
    <div class="formaC">
	<? foreach($arregloIdiomas as $cod => $idiomin){ ?>
 <div class="formaB">
		<?=$idiomin?>
    <textarea id="tituloEdit<?=$cod?>" name="titulo<?=$cod?>" class="textoEdit cke"><?=$traduccionA[$cod]['titulo']?></textarea>
</div>
<? } ?>
	</div>
</div>


<div class="formaB">
	<div class="formaT">Texto</div>
    <div class="formaC">
<? foreach($arregloIdiomas as $cod => $idiomin){ ?>
 <div class="formaB">
		<?=$idiomin?>
    <textarea id="textoEdit<?=$cod?>" name="textoEdit<?=$cod?>" class="textoEdit cke"><?=$traduccionA[$cod]['texto']?></textarea>
</div>
<? } ?>
	</div>
</div>


<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('boton');" id="tab-boton" class="elementoTabs none">Liga</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilos</div>
</div>
<div class="clear20"></div>



<div class="tabsDivs" id="ele-general">

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="text" id="colorFondo" name="colorFondo" class="colores"  value="<?=$colorFondo?>" onChange="cambiaColor();"/> 
	</div>
</div>


<div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
			
					<div class="left">		
							<select name="ancho" id="ancho">
							</select>
						</div>

					<div class="left padd5">
						<label  ><input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijoM==1){ ?>checked <? }?> > Ancho Fijo</label>
					</div>
					
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

</div>


<div class="oculta tabsDivs" id="ele-boton">

<div class="formaB">
  <div class="formaT">Título</div>
  <div class="formaC">
  <input type="text" id="tituloLiga" name="tituloLiga" class=""   value="<?=$tituloLiga?>" />
  </div>
</div>


<div class="formaB">
  <div class="formaT">Link</div>
  <div class="formaC">
  <input type="text" id="liga" name="liga" class=""   value="<?=$ligaM?>" />
  </div>
</div>

<div class="formaB">
  <div class="formaT">Destino</div>
  <div class="formaC">
  <select name="ligaTarget" id="ligaTarget">
  <option value="_self">Misma ventana</option>
  <option value="_blank">Nueva ventana</option>
  
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

<div class="oculta tabsDivs" id="ele-estilo">


 <div class="formaB">
	<div class="formaT">Clases Principal</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field clases" value="<?=$clases?>">
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Clases Imagen</div>
    <div class="formaC">
    <input type="text" name="clasesI" id="clasesI" class="field clases" value="<?=$clasesI?>">
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Clases para Títulos</div>
    <div class="formaC">
   <div class="div100" id="titulo_pre" style="background-image: url(<?=$url?>/img/transparente.png); height:150px; overflow-y:auto;">
   
   
   </div>
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases Título</div>
    <div class="formaC">
    <input type="text" name="clasesT" id="clasesT" class="field clases" value="<?=$clasesT?>">
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases para Textos</div>
    <div class="formaC">
   <div class="div100" id="texto_pre" style="background-image: url(<?=$url?>/img/transparente.png); height:150px; overflow-y:auto;">
   
   
   </div>
	</div>
</div>


 <div class="formaB">
	<div class="formaT">Clases Texto</div>
    <div class="formaC">
    <input type="text" name="clasesTit" id="clasesTit" class="field clasesTit" value="<?=$clasesTit?>">
	</div>
</div>
 <div class="formaB none">
	<div class="formaT">Clases Liga</div>
    <div class="formaC">
    <input type="text" name="clasesL" id="clasesL" class="field clases" value="<?=$clasesL?>">
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Style</div>
    <div class="formaC">
    <input type="text" name="style" id="style" class="field" value="<?=$style?>">
	</div>
</div>

</div>



<div style="clear:both; height:10px;"></div>
 
 <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>

</form>
</div>



<script>

 $.getScript('elementos.js', function() {
  anchos();
    clasesPre('titulo');
	  clasesPre('texto');
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#animacion').val('<?=$animacionM?>');
$('#flota').val('<?=$flota?>');
$('#alineacionV').val('<?=$alineacionV?>');

$('#bgAjuste').val('<?=$bgAjuste?>');
$('#posX').val('<?=$posX?>');
$('#posY').val('<?=$posY?>');

<? if($tituloPre!=""){
$tituloPre=explode(' ',$tituloPre);
foreach($tituloPre as $pr){ ?>
$( "#titulo_<?=$pr?>" ).prop( "checked", true );
<? }} ?>


 
<? if($textoPre!=""){
$textoPre=explode(' ',$textoPre);
foreach($textoPre as $pr){ ?>
$( "#texto_<?=$pr?>" ).prop( "checked", true );
<? }} ?>
 

<? } ?>


 $( '#imgContenido' ).archivos({
        campo: 'img',
        tipo: 'img',
		cuantos: 1,
		valor:'<?=$img?>'
    });

 });

$('#ligaTarget').val('<?=$ligaTargetM?>');
$('#estilo').val('<?=$estiloM?>');


</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	
	$tipoContenido="textoImagen";
	
	
		$traduccion=array();
	foreach($arregloIdiomas as $cod => $idiomin){
	
		$este=array();
		$este['titulo']=mataMalosTin(${'titulo'.$cod});
		$este['texto']=mataMalosTin(${'textoEdit'.$cod});

	$traduccion[$cod]=$este;
	}
	
	$parametros=array();
	$parametros['img']=mataMalos($img);
	
	$parametros['imgAlto']=$imgAlto;
	$parametros['imgAltoUnidades']=$imgAltoUnidades;
	$parametros['bgAjuste']=$bgAjuste;
	$parametros['posX']=$posX;
	$parametros['posY']=$posY;
	
	
	$parametros['tituloPre']=implode(' ',$tituloPre);
	$parametros['textoPre']=implode(' ',$textoPre);
	
	$parametros['titulo']=mataMalosTin($titulo);
	$parametros['texto']=mataMalosTin($textoEdit);
	$parametros['traduccion']=$traduccion;
	$parametros['colorFondo']=mataMalos($colorFondo);
	$parametros['ancho']=mataMalos($ancho);
	$parametros['anchoFijo']=$anchoFijo;
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	$parametros['animacion']=$animacion;
	$parametros['tituloLiga']=mataMalos($tituloLiga);
	$parametros['liga']=mataMalos($liga);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['style']=mataMalos($style);
	
	$parametros['clases']=$clases;
	$parametros['clasesI']=$clasesI;
	$parametros['clasesT']=$clasesT;
	$parametros['clasesTit']=$clasesTit;
	$parametros['clasesL']=$clasesL;
	
	
	
	$parametros['flota']=$flota;
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

