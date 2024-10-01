<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){
include "../../_files/filesSelect/archivosDisponibles.php"; 

$displa="none";
$paddT=0;
$paddR=0;
$paddB=0;
$paddL=0;

$marginT=0;
$marginB=0;
$opas=100;

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);

	$nombreBloque=$parametros['nombreBloque'];
	$tipoBloque=$parametros['tipoBloque'];
	
	//opciones contenedor
	$idContengo=$fila['idContenedor'];
	$reproduccion=$parametros['reproduccion'];
	$controles=$parametros['controles'];
	$duracion=$parametros['duracion'];
	//
	
	$ancho=$parametros['ancho'];
	$anchoFijo=$parametros['anchoFijo'];
	$alto=$parametros['alto'];
	$opas=$parametros['opacidadB'];
	$carrusel=$parametros['carrusel'];
	 
	
	$color=$parametros['colorFondo'];
	
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
	$clases=$parametros['clases'];
	$style=$parametros['style'];
	

	$elArchivo=$arregloArchivos[$imgFondo.'imagen'];

}

if($imagen=="1"){$displa="";}
	?>
	
	<div class="div100">
  <div class="div100 divElemento blanco10 " id="formaElemento">  

<form action="cuadricula.php" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="formA" value="afecta" >
<input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
<input type="hidden" name="seccion" value="<?=$seccion?>" >
<input type="hidden" name="e" value="<?=$e?>" >


 


<div class="div100">
<div onClick="eleTabs('general');" id="tab-general" class="elementoTabs elementoTabsP">General</div>
<div onClick="eleTabs('medidas');" id="tab-medidas" class="elementoTabs">Medidas</div>
<div onClick="eleTabs('estilo');"  id="tab-estilo" class="elementoTabs">Estilo</div>
</div>
<div class="clear20"></div>



<div class="tabsDivs" id="ele-general">




<div class="formaB">
	<div class="formaT">Nombre del bloque</div>
    <div class="formaC">
   <input type="text" name="nombreBloque" class="validate[required]" value="<?=$nombreBloque?>">
    </select>
	</div>
</div>


<div class="formaB">
	<div class="formaT">Contenido</div>
    <div class="formaC">
     <select name="tipoBloque" id="tipoBloque" onChange="$('.contOpciones').hide(); if(this.value){$('#contenedorDiv').show(); $('.'+this.value+'O').show(); }" <? if($elemento!=''){ ?> disabled <? }?> >
    <option value=""  >Propio</option>
    <option value="contenedor">Contenedor</option>
	   <option value="slider">Contenedor tipo Slider</option>
    </select>
	</div>
</div>

<? if($elemento!=''){ ?>
<input type="hidden" name="tipoBloqueO" value="<?=$tipoBloque?>">
<? } ?>


<div id="contenedorDiv" style="display: none">

<div class="formaB">
	<div class="formaT">Sección contenedor</div>
    <div class="formaC">
     <select name="contengo" id="contengo" class="validate[required]">
	     <option value="" selected disabled>Selecciona una sección</option>
   <?  $res6 = $mysqli->query("SELECT * FROM secciones WHERE tipo='contenedor'");
							$res6->data_seek(0);
							while ($fila = $res6->fetch_assoc()) 
							{
								$id=$fila['id'];	
							?>
							<option value="<?=$id?>"><?=$fila['titulo_es']?></option>
							<? } ?>
    </select>
	</div>
</div>


<div class="formaB sliderO contOpciones" style="display: none">
	<div class="formaT">Reproducción</div>
    <div class="formaC">
     <select name="reproduccion" id="reproduccion">
    <option value="auto">Automática</option>
    <option value="manual">Manual</option>
    </select>
	</div>
</div>

<div class="formaB sliderO contOpciones" style="display: none">
	<div class="formaT">Controles</div>
    <div class="formaC">
     <select name="controles" id="controles">
					<option value="" selecte disabled>Controles Slider</option>
    <option value="bolitas">Bolitas</option>
    <option value="titulo">Título de bloque</option>
    <option value="desctivado">Desactivados</option>
    </select>
	</div>
</div>


<div class="formaB sliderO contOpciones" style="display: none">
	<div class="formaT">Duración por bloque</div>
    <div class="formaC">

     <input type="number" step="0.1"  id="duracion" class="validate[required]" style="width: 200px;"  name="duracion" value="<?=$duracion?>"  > segundos

	</div>
</div>

</div>

 
<div class="formaB">
	<div class="formaT">Alto</div>
    <div class="formaC">
     <select name="alto" id="alto">
    <option value="auto"  >Automatico</option>
    <option value="ventana"  >Ventana</option>
    </select>
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

<div id="imgContenido" ></div>
<div class="clear10"></div>
<div id="imgContenido_Div" ></div>

Opacidad
 <input style="width: 70px" value="<?=$opas?>" name="opacidadB" type="number" class="validate[required, min[0], max[100]]">

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

 
<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
     <input type="text" readonly id="color" class="colores"  name="color" value="<?=$color?>"  >
    <div class="clear"></div>
   
	</div>
</div>



</div>
 
 

<div class="oculta tabsDivs" id="ele-medidas">



<div class="div100">

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

 });
 
 <? if ($elemento!=""){ ?>
$('#bgAjuste').val('<?=$bgAjuste?>');
$('#posX').val('<?=$posX?>');
$('#posY').val('<?=$posY?>');
$('#alto').val('<?=$alto?>');
<? } ?>

 $( '#imgContenido' ).archivos({
        campo: 'imgFondo',
        tipo: 'img',
		cuantos: 1,
		valor:'<?=$imgFondo?>'
    });

$('#tipoBloque').val('<?=$tipoBloque?>');

$('.contOpciones').hide(); 
 <? if ($tipoBloque!=""){ ?>
$('#contenedorDiv').show(); $('.<?=$tipoBloque?>O').show(); 
$('#contengo').val('<?=$idContengo?>').prop( "disabled", true );
$('#reproduccion').val('<?=$reproduccion?>');
$('#controles').val('<?=$controles?>');


<? } ?>

</script>

    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$contengo=mataMalos($contengo);
	$tipoContenido="cuadricula";
	
	if($imagen!=1){$imgFondo="";}

	$parametros=array();
 
	$parametros['nombreBloque']=mataMalos($nombreBloque);
	$parametros['alto']=mataMalos($alto);
	$parametros['colorFondo']=mataMalos($color);
	$parametros['imagen']=mataMalos($imagen);
	
	
	$parametros['tipoBloque']=$tipoBloque;
	if($cambia!=""){
		$parametros['tipoBloque']=$tipoBloqueO;
	}
	
	$parametros['reproduccion']=$reproduccion;
	$parametros['controles']=$controles;
	$parametros['duracion']=mataMalos($duracion);
	$parametros['paddT']=$paddT;
	$parametros['paddR']=$paddR;
	$parametros['paddB']=$paddB;
	$parametros['paddL']=$paddL;
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	
	
	$parametros['imgFondo']=mataMalos($imgFondo);
	$parametros['opacidadB']=mataMalos($opacidadB);
	$parametros['bgAjuste']=mataMalos($bgAjuste);
	$parametros['posX']=mataMalos($posX);
	$parametros['posY']=mataMalos($posY);
	$parametros['clases']=mataMalos($clases);
	$parametros['style']=mataMalos($style);
	
	$parametros=arregloMete($parametros);
	
	
if($cambia!=""){
$query1="UPDATE contenido SET parametros='$parametros' WHERE id='$cambia'";	
$mysqli->query($query1);

//reordemos las que quitas

 

$queryO="UPDATE contenido SET posicion='$columnas' WHERE posicion>'$columnas' AND idElemento='$cambia'";	
$mysqli->query($queryO);


}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idContenedor,tipo,parametros, posicion,jerarquia,orden) VALUES ('$cambia','$seccion','$contengo','$tipoContenido','$parametros', '0','3','100')";
	$mysqli->query($query1);
	
	//metemos la primera

	if($tipoBloque==''){
	
	$meteCol1=array();
	$meteCol1['ancho']=100;
	$columnasA[1]=$meteCol1;
	
	$parametros=array();
	$parametros['columnas']=1;
	$parametros['columnasA']=$columnasA;
	$parametros['anchoG']="sitio";

	
	$parametros=arregloMete($parametros);
	
	
	$cambia2=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,tipo,parametros,jerarquia,orden) VALUES ('$cambia2','$seccion','$cambia','grid','$parametros','2','100')";
	$mysqli->query($query1);
	
	}
	
	
	}


?>
 <script>
 localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<?

	

}



?>

