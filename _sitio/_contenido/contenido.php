<div class="div100" style="  width:100%; " id="sitio<?=$s?>">
<?
$arregloBloques=array();
$arregloGrids=array();
$arregloSortable=array();
$arregloParametros=array();
$arregloContenedores=array();
$centro="";
$claseFota="";
/* elementos */
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$s'  ORDER BY jerarquia DESC, posicion ASC, orden ASC");
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$hayCuadricula=1;
	$idE= $fila['id'];
	$idP= $fila['idElemento'];
	$idG= $fila['idGrid'];
	$idContenedor= $fila['idContenedor'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$arregloParametros[$idE]=$fila['parametros'];

	
	if($idContenedor!=""){$arregloContenedores[$idE]=$idContenedor;}

	if($posicion<1){$posicion="";}
	
	if($tipo=="cuadricula"){
		$arregloGridsMueve[]="#bloqueSort_".$idE;
		$arregloBloques[]=$idE;
		${'arregloBloquesElementos'.$idE}=array();
		${'arregloBloquesGrids'.$idE}=array();
		
	}
	
	
	if($tipo=="grid"){
		${'arregloBloquesGrids'.$idP}[$idE]=1;
	}
	

	if($idG!=""){
		${'arregloGridElementos'.$idG.$posicion}[$idE]=$tipo;
	}
	

	}

/*   */
 
foreach ($arregloBloques as $idC) {

$arregloB=arregloSaca($arregloParametros[$idC]);

	$altoB=$arregloB['altoG'] ?? '';
	$alturaMin=$arregloB['alturaMin'] ?? '';
	$altoBloque=$arregloB['alto'] ?? '';
	$colorFondo=$arregloB['colorFondo'] ?? '';
	if(isset($arregloB['opacidadB'])){ $opacidadB=$arregloB['opacidadB']/100 ; }
	$margenSupB=$arregloB['marginT'] ?? '';
	$margenInfB=$arregloB['marginB']  ?? '';
	
	//padss
	$paddBloque="";
	
	$paddT=$arregloB['paddT'] ?? '0';
	$paddR=$arregloB['paddR'] ?? '0';
	$paddB=$arregloB['paddB'] ?? '0';
	$paddL=$arregloB['paddL'] ?? '0';
	
	
	if($paddT >0 || $paddR >0 || $paddB >0 || $paddL >0  ){
	$paddBloque= "padding:".$paddT."px ".$paddR."px ".$paddB."px ".$paddL."px;";
	}
	//
	
	$imgFondo=$arregloB['imgFondo'] ?? '';
	$bgAjuste=$arregloB['bgAjuste'] ?? '';
	$posX=$arregloB['posX'] ?? '';
	$posY=$arregloB['posY'] ?? '';
	$clases=$arregloB['clases'] ?? '';
	$stylo=$arregloB['style'] ?? '';
	

	$bg=$arregloArchivos[$imgFondo.'imagenFront'] ?? '';
	$bgT=$arregloArchivos[$imgFondo.'imagenFrontT'] ?? '';;
	
	
	 $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
		 $elAjuste="background-size:".$bgAjuste.";";
	 }
	 
	  if($altoBloque=="ventana"){
 $altoBloque="height:80vh";
 }else 
 {
 $altoBloque="";
 }
	 
?>


<div class="div100 elementoBloque <?=$altoBloque?> <?=$clases?>" style=" margin-top: <?=$margenSupB?>px ; margin-bottom:<?=$margenInfB?>px;  min-height: <?=$alturaMin?>px;  background-color:<?=$colorFondo?>;      <?=$paddBloque?>  <?=$stylo?>  <?=$altoBloque?>   " id="<?=$idC?>" >

<? if( isset($arregloContenedores[$idC])){
$hayCarruseles=1;
include($rutaServer.'/_sitio/cache/'.$arregloContenedores[$idC].'.html'); 

} ?>

<? if($altoBloque!=""){ ?>
<div style="position: absolute; font-size: 50px; text-shadow: 0 0 5px rgba(0,0,0,.5); z-index: 1; bottom: 60px; left: 50%; color: #FFF;" class="material-icons">expand_more</div>
<? } ?>
<? if($bg!=""){ ?>
<div class="fondosLoad" data-bg="<?=$bg?>" data-bgm="<?=$bgT?>" style="width: 100%; height:100%; position: absolute; z-index: 0; <?=$elAjuste?> background-position:<?=$posX?> <?=$posY?>; opacity:<?=$opacidadB?>;    "></div>
<? } ?>
  <?

// primero los grids
foreach (${'arregloBloquesGrids'.$idC} as $idG=>$das){


$arregloGrid=arregloSaca($arregloParametros[$idG]);


	$idContenedor=$arregloGrid['idContenedor'] ?? '';
	$columnas=$arregloGrid['columnas'] ?? '';
	$columnasA=$arregloGrid['columnasA'] ?? '';	
	$anchoG=$arregloGrid['anchoG'] ?? '';
	$anchoFijoG=$arregloGrid['anchoFijoG'] ?? '';
	$altoBloqueG=$arregloGrid['altoBloque'] ?? '';
	$alturaMin=$arregloGrid['alturaMin'] ?? '';
	$colorFondo=$arregloGrid['colorFondo']  ?? '';
	$margenSupG=$arregloGrid['marginT'] ?? '';
	$margenInfG=$arregloGrid['marginB'] ?? '';
	$bg=$arregloGrid['bg'] ?? '';
	$bgAjuste=$arregloGrid['bgAjuste']  ?? '';
	$posX=$arregloGrid['posX']  ?? '';
	$posY=$arregloGrid['posY']  ?? '';
	$clases=$arregloGrid['clases']  ?? '';
	
	$colorFondoG=$arregloGrid['colorFondoG'] ?? '';
echo $idContenedor;
?> 
<div class="clear" style="height: <?=$margenSupG?>px"></div>
<div class="grid_All div100 <?=$clases?>" id="<?=$idG?>" style=" background-color: <?=$colorFondoG?>; <? if ($anchoG=="sitio"){ ?>max-width: <?=$anchoSitio?>px; margin:auto; float:none; <? } ?>">
<div class="grid_<?=$anchoG?>"<? if($anchoG=="sitio") {?> style=" max-width: <?=$anchoSitio?>px;" <? } ?>>

<?


$pad="";

//$tablaCell="block";
$tablaCell=" ";
if($columnas>1){$tablaCell="C";}
//despues sus ccolumnas
 for ($i = 1; $i <= $columnas; $i++) {
	 
	 $arregloSortable[]="#sortable_".$idG."_".$i;
	 
	 //columnas
	$arregloCol=$columnasA[$i];
	$colWidth=$arregloCol['ancho'] ?? '';
	$colImagen=$arregloCol['imgFondo'] ?? '';
	$colBgAjuste=$arregloCol['bgAjuste'] ?? '';
	$colImgContenido=$arregloCol['imgContenido'] ?? '';
	$colPosX=$arregloCol['posX'] ?? '';
	$colPosY=$arregloCol['posY'] ?? '';
	$colColorFondo=$arregloCol['colorFondo'] ?? '';
	$colCarrusel=$arregloCol['carrusel'] ?? '';
	$colClases=$arregloCol['clases'] ?? '';
	$colEstilo=$arregloCol['estilo'] ?? '';
	
	$colPadd="";
	
	
	$paddT=$arregloCol['paddT'] ?? '0';
	$paddR=$arregloCol['paddR'] ?? '0';
	$paddB=$arregloCol['paddB'] ?? '0';
	$paddL=$arregloCol['paddL'] ?? '0';

	
	
	if($paddT >0 || $paddR >0 || $paddB >0 || $paddL >0  ){
	$colPadd="padding:".$paddT."px ".$paddR."px ".$paddB."px ".$paddL."px;";
	}
	
	
	$paddBC=$arregloCol['paddB'] ?? '';
	$paddLC=$arregloCol['paddL'] ?? '';

	
	$colBg=$arregloArchivos[$colImagen.'imagenFront'] ?? '';
	 
	 $colElAjuste="background-repeat:".$colBgAjuste.";";
	 if($colBgAjuste=="cover" || $colBgAjuste=="contain"){ 
		 $colElAjuste="background-size:".$colBgAjuste.";";
	 }
	 
		$colAnchoRedondeo=floor($colWidth);
		
		if($anchoFijoG==1){$colAnchoRedondeo=$colAnchoRedondeo.'f';}
	 $flotinCol="";
	 if($columnas==1){$flotinCol="float:left;";}
	 
	 $opa=1;
	 if ($colCarrusel==1){
	 $hayCarruseles=1;
	 $opa=0;}
	
	
	
	
	 ?>
	<? if ($colCarrusel==1){ ?><div class="div100 textAlignCenter" id="columna_<?=$idG?>_<?=$i?>_load"><img src="/img/load.gif"></div><? } ?>
 <div class="div<?=$colAnchoRedondeo?><?=$tablaCell?> <?=$colClases?> <? if ($colCarrusel==1){ ?> columnaCarrusel <? } ?>" id="columna_<?=$idG?>_<?=$i?>" data-id="<?=$idG?>" data-pos="<?=$i?>" style=" vertical-align:top; background-color:<?=$colColorFondo?>; <?=$colElAjuste?> background-position:<?=$colPosX?> <?=$colPosY?>; <?=$flotinCol?>     <?=$colPadd?>; background-image:url(<?=$colBg?>);    <?=$colEstilo?> "> 
<?
$arregloGridElementos=${'arregloGridElementos'.$idG.$i} ?? '';
if(is_array($arregloGridElementos)){
foreach ($arregloGridElementos as $idElemento=>$tipoElemento){
include "contenidoParametros.php";
?>
<? if($flota=="centro"){ ?>
<div class="div100 textAlignCenter">
<? }

$fijon="";
if($anchoFijo==1){$fijon="f";}

$puedoFecha=1;

if($porFecha==1){

$puedoFecha="";
if(strtotime($hoyYMD)>=strtotime($fechaEleI) && strtotime($fechaEleF)>=strtotime($hoyYMD)){$puedoFecha=1;  }
}

$clasesI="";

if($tipoElemento=="img"){$clasesI=$parametrosE['clases'] ?? '';}
if($puedoFecha==1){
 
?>
<? if($granLigaE!=""){ ?><a href="<?=$granLigaE?>" target="<?=$granDestinoE?>" ><? } ?>
<div class="<?=$clasesI?> elemento div<?=$ancho?><?=$fijon?> <?=$pad?>  <?=$claseFota?> <?=$animaClass?> " data-animacion="<?=$animacion?>" style="  background-color:<?=$colorFondo?> <? if ($centro==1) {?> text-align:center;<? } ?>; <?=$paddElemento?>; <?=$marginElemento?> <?=$fondoElemento?> <?=$anchoFijoElemento?>" id="elemento_<?=$idElemento?>" data-id="<?=$idElemento?>">

  <?
$cuentaElementos=1;
   include "elementos/".$tipoElemento.".php"; 
   ?> 
</div>
 <? if($granLigaE!=""){ ?> </a><? } ?>
<? 
//fin de la fecha
}

?>

<? if($flota=="centro"){ ?>
</div>
<? } ?>
<?

// ciclo interior
} }
?>
</div>
<? if ($colCarrusel==1){ ?>
  <script>
setTimeout(function() {
 $('#columna_<?=$idG?>_<?=$i?>_load').remove();
 $('.columnaCarrusel').show();
$('#columna_<?=$idG?>_<?=$i?>').css('opacity',1);
  $('#columna_<?=$idG?>_<?=$i?>').slick({
  "dots":true,
  autoplay: true,
  autoplaySpeed: 5000,
  });
}, 500);
 </script>

<? } ?>

<? // fin de las colunmas 

}
//fin dle grid
?>
</div>

</div>
<? // fin del grid // ?>


<div class="clear" style="height: <?=$margenInfG?>px"></div>
<?
} ?>
<? // bloqueE?>

 
 <? // fin del contendor // ?>

 

 <? // bloque ?>
</div>
<?
	}
//actuales
?>
</div>
 
