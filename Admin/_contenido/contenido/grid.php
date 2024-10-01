<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){

include "../../_files/filesSelect/archivosDisponibles.php"; 
$displa="none";


$marginT=0;
$marginB=0;

 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$papa=$fila['idElemento'];
	$parametros=arregloSaca($fila['parametros']);
	$nombreCarrusel=$parametros['nombreCarrusel'];
	$columnas=$parametros['columnas'];
	$columnasA=$parametros['columnasA'];
	$ancho=$parametros['anchoG'];
	$responsivo=$parametros['responsivoG'];
	$alto=$parametros['altoG'];
	$imagen=$parametros['imagen'];
	$colorFondoG=$parametros['colorFondoG'];
	$margenSupG=$parametros['margenSup'];
	$margenInfG=$parametros['margenInf'];
	$bg=$parametros['imgContenido'];
	$bgAjuste=$parametros['bgAjuste'];
	$posX=$parametros['posX'];
	$posY=$parametros['posY'];
	$clases=$parametros['clases'];
	$estilo=$parametros['estilo'];
	$opacidad=$parametros['opacidad'];
	
	$marginT=$parametros['marginT'];
	$marginB=$parametros['marginB'];
 
	$elArchivo=$arregloArchivos[$bg.'imagen'];
}
 
//tienes carrusel
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$papa'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametrosP= arregloSaca($fila['parametros']);
	$carrusel=$parametrosP['carrusel'];
	}
if($opacidad==""){$opacidad="100";}
if($imagen=="1"){$displa="";}
	?>
 
 
  <div class="div100 divElemento blanco10 " id="formaElemento">  

 
<form action="grid.php" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >



 <div class="formaB">
	<div class="formaT">Columnas</div>
    <div class="formaC">
     <select name="columnas" id="columnas" onChange="columnasShow(this.value); return false;">
   <?  
   $llega=10;
   
   
   
   for ($i = 1; $i <= $llega; $i++) { ?>
    <option value="<?=$i?>"  ><?=$i?></option>
	<? } ?>
   
    </select>
	</div>
</div>

<div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
     <select name="ancho" id="ancho">
    <option value="sitio"  >Ancho de sitio</option>
    <option value="ventana" <? if($ancho=="ventana"){ ?> selected<? } ?> >Ventana </option>
    </select>
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
	<div class="formaT">Márgenes externos (px)</div>
    <div class="formaC">
   
   <div class="left padd5" style="width: 100px; text-align: center;">Superior<input type="text" class="entero textAlignCenter" name="marginT" id="marginT" value="<?=$marginT?>"></div>
   <div class="left padd5" style="width: 100px; text-align: center;">Inferior<input type="text" class="entero textAlignCenter" name="marginB" id="marginB" value="<?=$marginB?>"></div>
   
   
	</div>
</div>

<div class="formaB">
	<div class="formaT">Color de fondo</div>
    <div class="formaC">
   
      <input  class="field colores" type="text" readonly name="colorFondoG" value="<?=$colorFondoG?>"  >  
   
	</div>
</div>




 <div class="formaB">
	<div class="formaT">Responsivo</div>
    <div class="formaC">
 
	<label class="switch">
  <input type="checkbox" name="responsivo" id="responsivo" value="1" <? if($responsivo==1){ ?>checked <? }?> >	
  <span class="slider round"></span>
</label>
	
</div>
</div>
 
 
 
 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="clases field" value="<?=$clases?>">
	</div>
</div>

 
 
 <div class="formaB">
	<div class="formaT">Style</div>
    <div class="formaC">
    <input type="text" name="style" id="style" class="field" value="<?=$style?>">
	</div>
</div>








<?   for ($i = 1; $i <= 10; $i++) {
	$displaI=${'displa'.$i};

$arregloCol=$columnasA[$i];
 
$displaI="none";
$displaCol="none";	

 
if($i==1){$displaCol="";}

if($i<=$columnas){$displaCol="";}

 	$img=$arregloCol['img'];
	$colWidth=$arregloCol['ancho'];
	$colWidthFijo=$arregloCol['anchoFijo'];
	$colPadding=$arregloCol['padding'];
	$imgFondo=$arregloCol['imgFondo'];
	$colBgAjuste=$arregloCol['bgAjuste'];
	$colImgContenido=$arregloCol['imgContenido'];
	$colPosX=$arregloCol['posX'];
	$colPosY=$arregloCol['posY'];
	$colColorFondo=$arregloCol['colorFondo'];
	$colClase=$arregloCol['clases'];
	$colStyle=$arregloCol['estilo'];
	$colCarrusel=$arregloCol['carrusel'];
	$opas=$arregloCol['opacidad'];
	
	if($opas==""){$opas="100";}
	
	$paddT=$arregloCol['paddT'];
	$paddB=$arregloCol['paddB'];
	$paddR=$arregloCol['paddR'];
	$paddL=$arregloCol['paddL'];
	
	if($paddT==""){$paddT=0;}
	if($paddB==""){$paddB=0;}
	if($paddR==""){$paddR=0;}
	if($paddL==""){$paddL=0;}
		
$colElArchivo=$arregloArchivos[$imgFondo.'imagen'];

if($img=="1"){$displaI="";}
if($colWidth!=""){$displaCol="";}
	 ?>

<div class="columnasDivs padd20" data-id="<?=$i?>" style="float:left; width: 33%; min-width: 200px;    display:<?=$displaCol?>;" id="columna<?=$i?>">
<div class="div100" style="text-align: center; font-size: 15px; "><b>Columna <?=$i?></b></div>
<div class="div"></div>
  <div class="clear10"></div>

<div class="div100">
<div class="div33"  > 
	Ancho
 <select style="width: 75px;"  class="anchines" name="columna<?=$i?>_ancho" id="columna<?=$i?>_ancho">
    <? if ($i==1){ ?><option value="100"  >100%</option><? } ?>
    <option value="85"  >85%</option>
	<option value="75"  >75%</option>
    <option value="70"  >70%</option>
    <option value="66"  >66%</option>
    <option value="50"  >50%</option>
    <option value="33"  >33%</option>
	<option value="30"  >30%</option>
    <option value="25"  >25%</option>
    <option value="20"  >20%</option>
				<option value="15"  >15%</option>
	   <option value="16"  >1/6</option>
    <option value="14"  >1/7</option>
    <option value="12"  >1/8</option>
    <option value="11"  >1/9</option>
    <option value="10"  >10%</option>
	</select>
	</div>
	
	<div class="div33" >
	Fondo
 
     <input  class="field colores" type="text" readonly name="columna<?=$i?>_color" value="<?=$colColorFondo?>"  >
	</div>
	
	<div class="div33" >
	     <select name="columna<?=$i?>_imagen" class="field" id="columna<?=$i?>_imagenV" onChange="llevaImagen(this.value,'<?=$i?>'); return false;">
    <option value="">Sin imagen</option>
    <option value="1" <? if ($img==1) { ?>selected <?  } ?>>Imagen de fondo</option>
    </select>
	</div>
	
	 <div class="clear10"></div>
	
 <div class="llevaImagen" id="llevaImagen<?=$i?>" style="display: <?=$displaI?>">


<? /* archivos */ ?>
 <div class="clear10"></div>
 
<?=$colElArchivo?>


<div id="imgContenido<?=$i?>"></div>
<div class="clear10"></div>
<div id="imgContenido<?=$i?>_Div"></div>
<? /* archivos */ ?>



   <div class="clear10"></div>
    <div class="div33">
	 Ajuste
	 </div>
	 <div class="div66">
     <select name="columna<?=$i?>_bgAjuste" id="columna<?=$i?>_bgAjuste" class="field">
    <option value="cover"  >Cover 100%</option>
    <option value="contain" >Ajustar</option>
    <option value="repeat">Repetir x y</option>
    <option value="repeat-x">Repetir horizontal</option>
     <option value="repeat-y">Repetir vertical</option>
    </select>
	</div>


    <div class="clear10"></div>
	
	 <div class="div33">
 Posición  
 </div>   
 <div class="div33">
     <select name="columna<?=$i?>_posX" id="columna<?=$i?>_posX" class="field">
    <option value="center"  >Centro</option>
    <option value="top"  >Arriba</option>
    <option value="bottom"  >Abajo</option>
     </select>
	 </div>

	 
	 
 <div class="div33">
 
     <select name="columna<?=$i?>_posY" id="columna<?=$i?>_posY" class="field">
    <option value="center"  >Centro</option>
    <option value="left"  >Izquierda</option>
    <option value="right"  >Derecha</option>
     </select>
	 </div>

	    <div class="clear10"></div> 
	   <div class="div33">
	 Opacidad
	 </div>
	 <div class="div66">
     <input style="width: 70px" value="<?=$opas?>" name="columna<?=$i?>_opacidad" type="number" class="validate[required, min[0], max[100]]">
	</div>

	</div>
	
	<script>
	$('#columna<?=$i?>_bgAjuste').val('<?=$colBgAjuste?>');
	$('#columna<?=$i?>_posX').val('<?=$colPosX?>');
	$('#columna<?=$i?>_posY').val('<?=$colPosY?>');
	</script>
	
<div class="clear5"></div><div class="div"></div><div class="clear5"></div>

<div class="div100">

<div class="div100 textAlignCenter" style="font-weight: bold;">Márgenes Internos px</div>
<div class="clear"></div>
 <div class="div25f padd5" style=" text-align: center;">Sup<input type="text" class="entero textAlignCenter" name="columna<?=$i?>_paddT" id="columna<?=$i?>_paddT" value="<?=$paddT?>"></div>
   <div class="div25f padd5" style="text-align: center;">Der<input type="text" class="entero textAlignCenter" name="columna<?=$i?>_paddR" id="columna<?=$i?>_paddR" value="<?=$paddR?>"></div>
   <div class="div25f padd5" style=" text-align: center;">Inf<input type="text" class="entero textAlignCenter" name="columna<?=$i?>_paddB" id="columna<?=$i?>_paddB" value="<?=$paddB?>"></div>
   <div class="div25f padd5" style=" text-align: center;">Izq<input type="text" class="enter textAlignCenter" name="columna<?=$i?>_paddL" id="columna<?=$i?>_paddL" value="<?=$paddL?>"></div>
   
   </div>
 



    
 
 
</div>

    <div class="clear10"></div>
 
 <div class="div100 textAlignCenter" style="font-weight: bold;">Estilo</div>
 
 
 
Clases
      <div class="clear"></div>
     <input  class="field clases" type="text" name="columna<?=$i?>_clase" value="<?=$colClase?>" >
    <div class="clear10"></div>
	
	
	Style
      <div class="clear"></div>
     <input  class="field " type="text" name="columna<?=$i?>_estilo" value="<?=$colStyle?>" >
    <div class="clear10"></div>
 


</div>
 <script>
	
	
<? if($colWidth!=""){ ?>
	$('#columna<?=$i?>_ancho').val('<?=$colWidth?>');
	<? if($img==1) { ?>llevaImagen(<?=$img?>,'<?=$i?>')<? } ?>
<? }?>

$( '#imgContenido<?=$i?>' ).archivos({
        campo: 'imgFondo<?=$i?>',
        tipo: 'img',
		cuantos: 1,
		valor:'<?=$imgFondo?>'
    });


</script>


<? } ?>
 
 
 <script>
 $.getScript('elementos.js', function() {
 
 <? if( $columnas!="" ) { ?>
$('#columnas').val('<?=$columnas?>');


<? } ?> 
 
 });
 

	
	
 </script>
 
 


</form>
</div>

 
 
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$tipoContenido="grid";
	$padre=mataMalos($padre);
	
	$columnasA=array();
	
	
	
	
	for ($i = 1; $i <= $columnas; $i++) {
		
	 
	
	${'meteCol'.$i}=array();
	${'meteCol'.$i}['ancho']=${"columna".$i."_ancho"};
	${'meteCol'.$i}['img']=${"columna".$i."_imagen"};
	
	if(${"columna".$i."_imagen"}==1){
	${'meteCol'.$i}['imgFondo']=${"imgFondo".$i.""};
	}
	
	${'meteCol'.$i}['imgContenido']=${"imgContenido".$i};
	${'meteCol'.$i}['bgAjuste']=${"columna".$i."_bgAjuste"};
	${'meteCol'.$i}['posX']=${"columna".$i."_posX"};
	${'meteCol'.$i}['posY']=${"columna".$i."_posY"};
	${'meteCol'.$i}['colorFondo']=${"columna".$i."_color"};
	${'meteCol'.$i}['clases']=${"columna".$i."_clase"};
	${'meteCol'.$i}['estilo']=${"columna".$i."_estilo"};
	${'meteCol'.$i}['opacidad']=${"columna".$i."_opacidad"};
	${'meteCol'.$i}['carrusel']=${"columna".$i."_carrusel"};
	
	${'meteCol'.$i}['paddT']=${"columna".$i."_paddT"};
	${'meteCol'.$i}['paddR']=${"columna".$i."_paddR"};
	${'meteCol'.$i}['paddB']=${"columna".$i."_paddB"};
	${'meteCol'.$i}['paddL']=${"columna".$i."_paddL"};
		
    $columnasA[$i]=${'meteCol'.$i};
	}
	
	$parametros=array();
	$parametros['columnas']=mataMalos($columnas);
	$parametros['nombreCarrusel']=mataMalos($nombreCarrusel);
	$parametros['columnasA']=$columnasA;
	$parametros['anchoG']=mataMalos($ancho);
	$parametros['responsivoG']=$responsivo;
	$parametros['altoG']=mataMalos($alto);
	$parametros['colorFondoG']=mataMalos($colorFondoG);
	$parametros['imagen']=mataMalos($imagen);
	$parametros['margenSupG']=mataMalos($margenSup);
	$parametros['margenInfG']=mataMalos($margenInf);

	$parametros['bgAjuste']=mataMalos($bgAjuste);
	$parametros['posX']=mataMalos($posX);
	$parametros['posY']=mataMalos($posY);
	$parametros['clases']=mataMalos($clases);
	$parametros['estilo']=mataMalos($estilo);
	
	$parametros['marginT']=$marginT;
	$parametros['marginB']=$marginB;
	
	$parametros=arregloMete($parametros);
	
	
if($cambia!=""){
$query1="UPDATE contenido SET parametros='$parametros' WHERE id='$cambia'";	
$mysqli->query($query1);

//reordemos las que quitas

 

$queryO="UPDATE contenido SET posicion='$columnas' WHERE posicion>'$columnas' AND idGrid='$cambia'";	
$mysqli->query($queryO);
}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion, idElemento, tipo,parametros,jerarquia,orden) VALUES ('$cambia','$seccion', '$padre', '$tipoContenido','$parametros','2','100')";
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

