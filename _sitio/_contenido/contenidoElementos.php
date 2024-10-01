<?
$arregloBloques=array();
$arregloSortable=array();
$arregloVideoFondos=array();
$fila="";
$res65="";
/* elementos */
$selas="SELECT * FROM contenido WHERE  idSeccion='$s'  ORDER BY jerarquia DESC, posicion ASC, orden ASC";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
 
	$hayCuadricula=1;
	$idE= $fila['id'];
	$idP= $fila['idElemento'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	
	
	if($posicion<1){$posicion="";}
	
	if($tipo=="cuadricula"){
		
		$arregloBloques[]=$idE;
		${'arregloBloquesElementos'.$idE}=array();
		
	}
	
 
	if($idP!=""){
		${'arregloBloquesElementos'.$idP}[]=$idE;
	}
	
	
		${'arreglo'.$idE}=array();
	
	$parametros= arregloSaca($fila['parametros']);
	${'arreglo'.$idE}['tipo']=$tipo;
	${'arreglo'.$idE}['posicion']=$posicion;
	
	
	${'arreglo'.$idE}['columnas']=$parametros['columnas'];
	${'arreglo'.$idE}['columnasA']=$parametros['columnasA'];
	${'arreglo'.$idE}['video']=$parametros['video'];
	
	${'arreglo'.$idE}['anchoBloque']=$parametros['ancho'];
	${'arreglo'.$idE}['anchoFijoBloque']=$parametros['anchoFijo'];
	${'arreglo'.$idE}['altoBloque']=$parametros['alto'];
	${'arreglo'.$idE}['alturaMin']=$parametros['alturaMin'];
	${'arreglo'.$idE}['margenSupBloque']= $parametros['margenSup'];
	${'arreglo'.$idE}['margenInfBloque']= $parametros['margenInf'];
		
	${'arreglo'.$idE}['colorFondo']= $parametros['colorFondo'];
	${'arreglo'.$idE}['bg']=$parametros['imgContenido'];
	
	${'arreglo'.$idE}['estiloTextoImagen']=$parametros['estiloTextoImagen'];
	
	${'arreglo'.$idE}['file']=$parametros['file'];
	${'arreglo'.$idE}['icon']=$parametros['icon'];
	${'arreglo'.$idE}['idRegistro']=$parametros['idRegistro'];
	
	${'arreglo'.$idE}['bgAjuste']=$parametros['bgAjuste'];
	${'arreglo'.$idE}['posX']=$parametros['posX'];
	${'arreglo'.$idE}['posY']=$parametros['posY'];
	${'arreglo'.$idE}['clases']=$parametros['clases'];
	${'arreglo'.$idE}['flota']=$parametros['flota'];
	${'arreglo'.$idE}['img']= $parametros['img'];
	${'arreglo'.$idE}['ajusteImg']= $parametros['ajusteImg'];
	${'arreglo'.$idE}['ancho']= $parametros['ancho'];
	${'arreglo'.$idE}['anchoFijo']= $parametros['anchoFijo'];
	${'arreglo'.$idE}['titulo']= $parametros['titulo'];
	${'arreglo'.$idE}['texto']= $parametros['texto'];
	${'arreglo'.$idE}['margen']= $parametros['margen'];

	${'arreglo'.$idE}['padding']= $parametros['padding'];
	${'arreglo'.$idE}['centro']= $parametros['centro'];
	${'arreglo'.$idE}['sub']=$parametros['sub'];
	
	${'arreglo'.$idE}['animacion']=$parametros['animacion'];
	
	${'arreglo'.$idE}['codigo']=$parametros['codigo'];
	
	${'arreglo'.$idE}['hache']=$parametros['hache'];
	
	${'arreglo'.$idE}['categoria']=$parametros['categoria'];
	${'arreglo'.$idE}['entradas']=$parametros['entradas'];
	${'arreglo'.$idE}['vista']=$parametros['vista'];
	
	${'arreglo'.$idE}['colorTitulo']=$parametros['colorTitulo'];
	${'arreglo'.$idE}['colorTexto']=$parametros['colorTexto'];
	
	${'arreglo'.$idE}['textoDownload']=$parametros['textoDownload'];
		
	${'arreglo'.$idE}['producto']=$parametros['producto'];
	${'arreglo'.$idE}['cat']=$parametros['cat'];
	${'arreglo'.$idE}['catS']=$parametros['catS'];
	
	${'arreglo'.$idE}['videoFondo']= $parametros['videoFondo'];
	${'arreglo'.$idE}['bannerFondo']= $parametros['bannerFondo'];
	
	
	${'arreglo'.$idE}['imgsUrls']= $parametros['imgsUrls'];
	
	${'arreglo'.$idE}['alto']= $parametros['alto'];
	${'arreglo'.$idE}['linea']= $parametros['linea'];
	
	${'arreglo'.$idE}['orden']= $parametros['orden'];
	${'arreglo'.$idE}['liga']= $parametros['liga'];
	
	${'arreglo'.$idE}['acordeones']= $parametros['acordeones'];
	}
/*   */
 
foreach ($arregloBloques as $idC) {
$arregloBloque=${'arreglo'.$idC};
$arregloBloquesElementos=${'arregloBloquesElementos'.$idC};
	
	$columnas=$arregloBloque['columnas'];
	$columnasA=unserialize(base64_decode($arregloBloque['columnasA']));	
	$anchoBloque=$arregloBloque['anchoBloque'];
	$anchoFijoBloque=$arregloBloque['anchoFijoBloque'];
	$altoBloque=$arregloBloque['altoBloque'];
	$alturaMin=$arregloBloque['alturaMin'];
	$margenSupBloque=$arregloBloque['margenSupBloque'];
	$margenInfBloque=$arregloBloque['margenInfBloque'];
	$colorFondo=$arregloBloque['colorFondo'] ;
	$bg=$arregloBloque['bg'] ;
	$video=$arregloBloque['video'] ;
	$bgAjuste=$arregloBloque['bgAjuste'] ;
	$posX=$arregloBloque['posX'] ;
	$posY=$arregloBloque['posY'] ;
	$clases=$arregloBloque['clases'] ;
	$style=$arregloBloque['style'] ;
	$bg=$arregloArchivos[$bg.'imagenFront'];
	
	 $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
		 $elAjuste="background-size:".$bgAjuste.";";
	 }
?>
<div class="elementoBloque  bloqus <?=$altoBloque?> <?=$clases?>  " style="  width:100%; position:relative;  float:left; min-height: <?=$alturaMin?>px;    background-color:<?=$colorFondo?>; <?=$elAjuste?> background-position:<?=$posX?> <?=$posY?>;   <? if ($bg!=""){ ?>  background-image:url(<?=$bg?>); <? } ?>;   margin-top: <?=$margenSupBloque?>px; margin-bottom: <?=$margenInfBloque?>px;  <?=$style?>" id="elemento_<?=$idC?>"  data-id="<?=$idC?>">
<? if ($anchoBloque=="ventana") { ?>
<div style="width:100%; display:table; float:left; height:100%;   height: 100%;  " class="conectados" > 
<? } ?>
<? if ($anchoBloque=="sitio") { ?>
<div   style="max-width:1000px; width:100%;   margin:auto;" class="maximoSitio" > 
<div style="  width:100%; float:left; display:table;     min-height: <?=$alturaMin?>px; " class="conectados" > 
<? } ?>
<?
// inicio de las columnas
 for ($i = 1; $i <= $columnas; $i++) {
	 
	 $arregloSortable[]="#sortable_".$idC."_".$i;
	 
	 //columnas
	 $arregloCol=unserialize(base64_decode($columnasA[$i]));
	 $colAncho=$arregloCol['ancho'];
	$colImagen=$arregloCol['imagen'];
	$colBgAjuste=$arregloCol['bgAjuste'];
	$colImgContenido=$arregloCol['imgContenido'];
	$colPosX=$arregloCol['posX'];
	$colPosY=$arregloCol['posY'];
	$colColorFondo=$arregloCol['colorFondo'];
	$colClases=$arregloCol['clases'];
	
	$colBg=$arregloArchivos[$colImgContenido.'imagenFront'];
	 
	 $colElAjuste="background-repeat:".$colBgAjuste.";";
	 if($colBgAjuste=="cover" || $colBgAjuste=="contain"){ 
		 $colElAjuste="background-size:".$colBgAjuste.";";
	 }
	
	 
	 $colAnchoRedondeo=floor($colAncho);
		
		if($anchoFijoBloque==1){$colAnchoRedondeo=$colAnchoRedondeo.'f';}
	 
	 ?>
 <div  class="div<?=$colAnchoRedondeo?> columna columna<?=$idC?> <?=$colClases?>"  id="columna_<?=$idC?>_<?=$i?>"  style=" float:left; vertical-align:top;   background-color:<?=$colColorFondo?>; <?=$colElAjuste?> background-position:<?=$colPosX?> <?=$colPosY?>;   <? if ($colBg!="") { ?> background-image:url(<?=$colBg?>); <? } ?>"> 
<?
foreach ($arregloBloquesElementos as $primerNivel){
	
	
		 include "contenidoParametros.php";  
	 if($posicion==$i){
		 
		 
	$animaClass="";
	 if($animacion!=""){$animaClass="animacion";}
		 
		 $anchoFloor=floor($ancho);
?>
<div class="elemento <?=$pad?> div<?=$anchoFloor?>  <?=$animaClass?> " data-animacion="<?=$animacion?>" style="float:<?=$flota?>;   <? if ($margen!=""){ ?> margin-bottom:10px; <? } ?> background-color:<?=$colorFondo?>;   <? if ($centro==1) {?> text-align:center;<? } ?>; " id="elemento_<?=$primerNivel?>"  >
  <?
  
   include "contenidoElementos.php"; 
  
   ?> 
</div>
 
<?
// posicion
}
// ciclo interior
}
?>
</div> 
<? // fin de las colunmas 
} ?>
<? if ($anchoBloque=="sitio") { ?>
</div>  </div>
<? } ?>
 
<? if ($anchoBloque=="ventana") { ?>
</div>
<? } ?>
</div>
<?
	}
?>
</div> 
<script>
<? if ($arregloVideoFondos!="") {?>
var movil="";
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
 movil="1";
}
if(movil==""){
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
<? foreach($arregloVideoFondos as $videoFondin) { ?>

var player<?=$videoFondin?>;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player<?=$videoFondin?>', {
        playerVars: {
            'autoplay': 1,
            'controls': 0.,
            'autohide': 1,
            'wmode': 'opaque',
            'showinfo': 0,
            'loop': 1,
            'mute': 1,
            'playlist': '<?=$videoFondin?>'
        },
        videoId: '<?=$videoFondin?>',
        events: {
            'onReady': onPlayerReady
        }
    });
}
function onPlayerReady(event) {
    event.target.mute();
   
 
}
<? } ?>
}
<? } ?>
</script>