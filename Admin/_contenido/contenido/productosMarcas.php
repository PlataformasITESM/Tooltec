<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){
include "../../_files/filesSelect/archivosDisponibles.php"; 
$mi='checked="checked"';
$md=' "';

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];

$displa="none";
$paddT=0;
$paddR=0;
$paddB=0;
$paddL=0;

$marginT=0;
$marginB=0;
$marcasAltura=100;
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);


	$textoM=$parametros['texto'];
	$anchoM=$parametros['ancho'];
	$anchoFijoM=$parametros['anchoFijo'];
	
	
	$paddT=$parametros['paddT'];
	$paddR=$parametros['paddR'];
	$paddB=$parametros['paddB'];
	$paddL=$parametros['paddL'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];
	
	$imagen=$parametros['imagen'];
	$imgFondo=$parametros['imgFondo'];
	
	$bgAjuste=$parametros['bgAjuste'];
	$posX=$parametros['posX'];
	$posY=$parametros['posY'];
	
	$colorFondo=$parametros['colorFondo'];
	$animacionM=$parametros['animacion'];
	$clases=$parametros['clases'];
	$ancho=$parametros['ancho'];
	$flota=$parametros['flota'];
	$style=$parametros['style'];
	
	$marcasCuantos=$parametros['marcasCuantos'];
	$marcasTexto=$parametros['marcasTexto'];
	$marcasOrden=$parametros['marcasOrden'];
	$marcasCarrusel=$parametros['marcasCarrusel'];
	$marcasLinea=$parametros['marcasLinea'];
	$marcasAltura=$parametros['marcasAltura'];
	
	
	
	}
	
 if($imagen==1){$displa="";
$elArchivo=$arregloArchivos[$imgFondo.'imagen'];
}

	?>
	<div class="div100">
  <div class="div100   blanco10">  
 
    <form action="productosMarcas.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
   

<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('fondo');" id="tab-fondo" class="elementoTabs">Fondo</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>


<div class="tabsDivs" id="ele-general">

<div class="div50">
 <div class="formaB">
 	<div class="formaT">Cantidad</div>
    <div class="formaC">
    <select name="marcasCuantos" id="marcasCuantos" onChange="cambiaCantidad(this.value)">
    <option value="nombre"  > Todas</option>
    <option value="cantidad"  >Limitar</option>
	</select>
	<input type="number" id="marcasCuantosCantidad" value="<?=$marcasCuantosCantidad?>"  name="marcasCuantosCantidad" class="validate[required,min[1]]">
	</div>
 </div>
 </div>
 
 <div class="div50">
 <div class="formaB">
 	<div class="formaT">Ordernar por</div>
    <div class="formaC">
    <select name="marcasOrden" id="marcasOrden">
    <option value="nombre"  > Por nombre </option>
    <option value="vendidas"  > Más vendidas</option>
	<option value="nuevas"  >Nuevas</option>
	<option value="destacadas"  >Destacadas</option>
	</select>
	</div>
 </div>
 </div>
 
 <div class="clear"></div>
 
 
 <div class="formaB">
 	<div class="formaT">Mostrar</div>
    <div class="formaC">
    <select name="marcasCarrusel" id="marcasCarrusel">
    <option value="scroll"  >Todas las categorías en una sola línea con scroll</option>
    <option value="bloque"  >En bloques hacia abajo</option>
	</select>
	</div>
 </div>
  <div class="clear"></div>
 
   <div class="div50">
 <div class="formaB">
 	<div class="formaT">Información</div>
    <div class="formaC">
    <select name="marcasTexto" id="marcasTexto">
    <option value="0"  >Icono y título</option>
    <option value="1"  >Solo icono</option>
	<option value="2"  >Solo título</option>
	</select>
	</div>
 </div>
 </div>
   <div class="div50">
 <div class="formaB">
 	<div class="formaT">Marcas por línea</div>
    <div class="formaC">
    <select name="marcasLinea" id="marcasLinea">
    <option value="1"  >1</option>
    <option value="2"  >2</option>
	<option value="3"  >3</option>
	<option value="4"  >4</option>
	<option value="5"  >5</option>
	<option value="6"  >6</option>
	<option value="8"  >8</option>
	<option value="10"  >10</option>
	
	</select>
	</div>
 </div>
 </div>
 
 
 <div class="clear"></div>
 
<div class="div50">
 <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
				
		<div class="left">		
    <select name="ancho" id="ancho"></select>
	</div>
	
	
	</div>
</div>
</div>

<div class="div50">
 <div class="formaB">
	<div class="formaT">Ancho Fijo. <br>No responsivo</div>
    <div class="formaC">
				
		
<label class="switch">
  <input type="checkbox" name="anchoFijo" id="anchoFijo" value="1" <? if($anchoFijo==1){ ?>checked <? }?> >	
  <span class="slider round"></span>
</label>
	</div>
	
	</div>
</div>



<div class="div50">
	<div class="formaT">Alineación Horizontal</div>
    <div class="formaC">
    <select name="flota" id="flota">
    <option value="left"  > Izquierda </option>
    <option value="right"  > Derecha</option>
	 <option value="centro"  > Centro</option>
	</select>
	</div>
</div>



<div class="div50">
	<div class="formaT">Alineación Vertical</div>
    <div class="formaC">
    <select name="alineacionV" id="alineacionV">
    <option value="auto"  >Automática</option>
    <option value="medio"  > Al centro de su columna</option>
	 <option value="abajo"  >Al fondo de su columna</option>
	</select>
	</div>
</div>

<div class="clear10"></div>
<div class="formaB">
	<div class="formaT">Efecto</div>
    <div class="formaC">
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
</div>


</div>

<div class="oculta tabsDivs" id="ele-medidas">



<div class="div100">

<div class="div50">
 <div class="formaB">
 	<div class="formaT">Altura  (px)</div>
    <div class="formaC">
	<input type="number" id="marcasAltura" value="<?=$marcasAltura?>"  name="marcasAltura" class="validate[required,min[50]]">
	</div>
 </div>
 </div>



<div class="formaB">
	<div class="formaT">Márgenes internos (px)</div>
    <div class="formaC">
   <div class="left padd5" style="width: 90px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="paddT" id="paddT" value="<?=$paddT?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Derecho<input type="text" class="entero textAlignCenter" name="paddR" id="paddR" value="<?=$paddR?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="paddB" id="paddB" value="<?=$paddB?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Izquierdo<input type="text" class="enter textAlignCenter" name="paddL" id="paddL" value="<?=$paddL?>"></div>
</div>
</div>


<div class="formaB">
	<div class="formaT">Márgenes externos (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 90px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 90px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>



</div>



</div>

<div class="oculta tabsDivs" id="ele-fondo">
<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
    <input type="text" id="colorFondo" name="colorFondo" class="colores"  value="<?=$colorFondo?>" /> 
   
	</div>
</div>


<div class="formaB">
	<div class="formaT">Imagen</div>
    <div class="formaC">
     <select name="imagen" id="imagenV" onChange="llevaImagen(this.value,'0'); return false;">
    <option value="">Sin imagen</option>
    <option value="1" <? if ($imagen==1) { ?> selected <? } ?>>Imagen de fondo</option>
    </select>
	</div>
</div>


 <div class="llevaImagen" id="llevaImagen0" style="display:<?=$displa?>">


<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagen de fondo</div>
<div class="formaC">
<?=$elArchivo?>

<div id="imgContenido"></div>
<div class="clear10"></div>
<div id="imgContenido_Div"></div>
</div>
</div>

<? /* archivos */ ?>


<div class="formaB">
	<div class="formaT">Ajustar</div>
    <div class="formaC">
     <select name="bgAjuste" id="bgAjuste">
    <option value="cover"  >Cubrir 100%</option>
    <option value="contain" >Ajustar imagen</option>
    <option value="repeat">Repetir </option>
    <option value="repeat-x">Repetir horizontal</option>
     <option value="repeat-y">Repetir vertical</option>
	 <option value="no-repeat">No repetir</option>
    </select>
	</div>
</div>



<div class="formaB">
	<div class="formaT">Posición de imagen</div>
    <div class="formaC">
    
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
</div>

</div>

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
 
</form>
</div>
</div>
<script>

 $.getScript('elementos.js', function() {
  anchos();
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#animacion').val('<?=$animacionM?>');
$('#flota').val('<?=$flota?>');
$('#alineacionV').val('<?=$alineacionV?>');

$('#bgAjuste').val('<?=$bgAjuste?>');
$('#posX').val('<?=$posX?>');
$('#posY').val('<?=$posY?>');
$('#marcasCuantos').val('<?=$marcasCuantos?>');
$('#marcasTexto').val('<?=$marcasTexto?>');
$('#marcasOrden').val('<?=$marcasOrden?>');
$('#marcasLinea').val('<?=$marcasLinea?>');
<? } ?>
 });
 
 function cambiaCantidad(este){
 if(este=="cantidad"){
 $('#marcasCuantosCantidad').show();
 }
 else {
  $('#marcasCuantosCantidad').hide();
 }
 }
 
 cambiaCantidad('<?=$cambiaCuantos?>');
 
  $( '#imgContenido' ).archivos({
        campo: 'imgFondo',
        tipo: 'img',
		cuantos: 1,
		valor:'<?=$imgFondo?>'
    });
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	$textoEdit=mataMalosTin($textoEdit);
	$texto=$textoEdit;
	$tipoContenido="productosMarcas";
	
	$parametros=array();
	$parametros['texto']=$textoEdit;
	$parametros['ancho']=$ancho;
	$parametros['anchoFijo']=$anchoFijo;
	
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	$parametros['alineacionV']=$alineacionV;
	
	$parametros['marcasCuantos']=$marcasCuantos;
	$parametros['marcasTexto']=$marcasTexto;
	$parametros['marcasOrden']=$marcasOrden;
	$parametros['marcasCarrusel']=$marcasCarrusel;
	$parametros['marcasLinea']=$marcasLinea;
	$parametros['marcasAltura']=$marcasAltura;
	
	
	$parametros['imagen']=mataMalos($imagen);
	
	if($imagen==1){
	$parametros['imgFondo']=mataMalos($imgFondo);
	$parametros['bgAjuste']=mataMalos($bgAjuste);
	$parametros['posX']=mataMalos($posX);
	$parametros['posY']=mataMalos($posY);
	}
	
	$parametros['animacion']=$animacion;
	$parametros['colorFondo']=$colorFondo;
	$parametros['flota']=$flota;
	$parametros['clases']=$clases;
	$parametros['style']=$style;
	$parametros=arregloMete($parametros);
	

	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros' WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}
	
?>
<script>
localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<?
}
?>
