<? include_once "../../sesion/arriba.php";
include_once "../../_files/filesSelect/archivosDisponibles.php";

if($cambia!=""){
	?>
	<script>
		window.location.hash ='#elemento_<?=$cambia?>';
</script>
	<?
	
}

$arregloClasesTits=array();
$res6 = $mysqli->query("SELECT * FROM codigo  where sistema='tits' limit 1");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$codigo= str_replace(' ','',base64_decode($fila['codigo']));
for ($i = 1; $i <= 9; $i++) {
$codigo=str_replace('.'.$i,'',$codigo);
}

$codigoTit= explode('.',$codigo); // 'ABC '
foreach($codigoTit as $cods){
$cods=explode('{',$cods)[0];
if($cods!=""){$arregloClasesTits[]=$cods;}
}
}

$arregloClasesTexto=array();
$res6 = $mysqli->query("SELECT * FROM codigo  where sistema='text' limit 1");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$codigo= str_replace(' ','',base64_decode($fila['codigo']));
for ($i = 1; $i <= 9; $i++) {
$codigo=str_replace('.'.$i,'',$codigo);
}
$codigoTit= explode('.',$codigo); // 'ABC '
foreach($codigoTit as $cods){
$cods=explode('{',$cods)[0];
if($cods!=""){$arregloClasesTexto[]=$cods;}
}

}
	

?>

<input type="hidden" id="arregloClasesTits" value="<?=implode(',',$arregloClasesTits)?>">
<input type="hidden" id="arregloClasesTexto" value="<?=implode(',',$arregloClasesTexto)?>">

<div id="actuales" style="  width:100%; ">
<?
if($seccion!=""){$valor=limpiaGet($seccion); }

if($versionVista!=''){$valor=$valor.'_'.$versionVista;}

$arregloBloques=array();
$arregloGrids=array();
$arregloSortable=array();
$arregloParametros=array();

/* elementos */
$selas="SELECT * FROM contenido WHERE  idSeccion='$valor'  ORDER BY jerarquia DESC, posicion ASC, orden ASC";
//echo $selas;
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$hayCuadricula=1;
	$idE= $fila['id'];
	$idP= $fila['idElemento'];
	$idG= $fila['idGrid'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$arregloParametros[$idE]=$fila['parametros'];
	
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
	

	
	$parametros= arregloSaca($fila['parametros']);
	}

/*   */
 
foreach ($arregloBloques as $idC) {


$arregloB=arregloSaca($arregloParametros[$idC]);

	$nombreBloque=$arregloB['nombreBloque'];
	$altoB=$arregloB['altoG'];
	$altoBloque=$arregloB['alto'];
	$alturaMin=$arregloB['alturaMin'];
	$colorFondo=$arregloB['colorFondo'] ;
	$opacidadB=$arregloB['opacidadB']/100 ;
	$margenSupB=$arregloB['marginT'];
	$margenInfB=$arregloB['marginB'];
	
	//padss
	$paddBloque="";
	if($arregloB['paddT'] >0 || $arregloB['paddR'] >0 || $arregloB['paddB'] >0 || $arregloB['paddL'] >0  ){
	$paddBloque= "padding:".$arregloB['paddT']."px ".$arregloB['paddR']."px ".$arregloB['paddB']."px ".$arregloB['paddL']."px;";
	}
	//
	
	$imgFondo=$arregloB['imgFondo'] ;
	$bgAjuste=$arregloB['bgAjuste'] ;
	$posX=$arregloB['posX'] ;
	$posY=$arregloB['posY'] ;
	$clases=$arregloB['clases'] ;
	

	$bg=$arregloArchivos[$imgFondo.'imagenFront'];
	
	
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


<div class="div100 elementoBloque  <?=$clases?> scroll<?=$idC?>" style="   width:100%;  float:left; min-height: <?=$alturaMin?>px;  background-color:<?=$colorFondo?>;  padding-top:30px; margin-bottom:20px;     <?=$altoBloque?>   " id="<?=$idC?>" >
<div style="width: 100%; height: calc(100% - 30px); position: absolute; z-index: 0; <?=$elAjuste?> background-position:<?=$posX?> <?=$posY?>; opacity:<?=$opacidadB?>;   min-height:30px; background-image:url(<?=$bg?>);"></div>

<div class="elementoBloqueBotones" id="elemento_<?=$idC?>_controles" style="width:100%;   height:30px;"  >

<? if($permisoReordenar==1) { ?>
     <div class="left draginC elementoBloqueBotonesBoton material-icons" style=" width: 30px; cursor:move;  ">
    drag_indicator
     </div>
	 <? } ?>
	
	<div class="left elementoBloqueBotonesBoton">
    Bloque (<em><?=$nombreBloque?></em>)
	</div>
	<? if($permisoCrear==1) { ?>
	<div onclick="elementoTipo('grid','<?=$idC?>','');" class="left cursor" style="margin-left: 20px;">
	<div  class="left elementoBloqueBotonesBoton material-icons" >
    add
    </div>
	
	<div class="left elementoBloqueBotonesBoton">
	Agregar Columnas
	</div>
	
	</div>
	<?} ?>
	<div class="right botonesAccion">
	
	<? if($permisoModificar==1) { ?>
	       <div  class="left elementoBloqueBotonesBoton opacidad" style="float:right; margin-right:20px; cursor:pointer;" onclick="elementoTipo('cuadricula','','<?=$idC?>');return false;" >
    Editar Bloque
    </div>
				
				<div  class="left elementoBloqueBotonesBoton opacidad" style="float:right; margin-right:20px; cursor:pointer;" onclick="javascript:if (confirm('¿Desea duplicar el bloque y todos  sus elementos?')){bloqueCopiar('<?=$idC?>','<?=$valor?>');return false;}" >
    Duplicar Bloque
    </div>
	<? } ?>
	<? if($permisoEliminar==1) { ?>
    <div  class="left elementoBloqueBotonesBoton borra " style="margin-right:10px" id="borra<?=$idC?>" class=" borra" 10; onclick="javascript:if (confirm('¿Desea eliminar el elemento y todo  su contenido?')){eliminarE('<?=$idC?>');return false;}">
   Borrar
    </div>
	<? } ?>

	</div>
</div>

<? if ($margenSupB>0){ ?>
<div class="margenBloque" style="height:<?=$margenSupB?>px;" data-info="Margen Sup <?=$margenSupB?>px "></div>
<? } ?>

<div class="div100" style="<?=$paddBloque?>" id="bloque_<?=$idC?>"  data-id="<?=$idC?>">


<div style="width:100%; display:table; float:left;   min-height: 30px; " class="dropB  contectadosGrid" id="bloqueSort_<?=$idC?>" > 
  <?

// primero los grids
foreach (${'arregloBloquesGrids'.$idC} as $idG=>$das){


$arregloGrid=arregloSaca($arregloParametros[$idG]);


	
	$columnas=$arregloGrid['columnas'];
	$nombreCarrusel=$arregloGrid['nombreCarrusel'];
	$columnasA=$arregloGrid['columnasA'];	
	$anchoG=$arregloGrid['anchoG'];
	$anchoFijoG=$arregloGrid['anchoFijoG'];
	$altoBloqueG=$arregloGrid['altoBloque'];
	$alturaMin=$arregloGrid['alturaMin'];
	$colorFondo=$arregloGrid['colorFondo'] ;
	$margenSupG=$arregloGrid['marginT'];
	$margenInfG=$arregloGrid['marginB'];
	$bg=$arregloGrid['bg'] ;
	$bgAjuste=$arregloGrid['bgAjuste'] ;
	$posX=$arregloGrid['posX'] ;
	$posY=$arregloGrid['posY'] ;
	$clases=$arregloGrid['clases'] ;
$colorFondoG=$arregloGrid['colorFondoG'] ;
?> 


<div class="div100 bloqueGrid scroll<?=$idG?> g<?=$idG?>" id="<?=$idG?>" style="background-color: <?=$colorFondoG?>; <? if ($anchoG=="ventana"){ ?>max-width: <?=$anchoSitio?>px; margin:auto; float:none; <? } ?> " <>


<div class="elementoGridBotones" id="elemento_<?=$idG?>_controles" style="width:100%; top:-30px; height:30px;"  >
<? if($permisoReordenar==1) { ?>
   <div class="draginG elementoBloqueBotonesBoton material-icons" style="float:left;  cursor:move;  ">
    drag_indicator
     </div>
	 <? } ?>
    
	<div class="left elementoBloqueBotonesBoton">
    <?=$columnas?> Columna<? if($columnas>1){ ?>s<? } ?> <? if($nombreCarrusel!=""){ ?> (<?=$nombreCarrusel?>)<? } ?>
	</div>
	
	<div class="right botonesAccion">
	
	<? if($permisoModificar==1) { ?>
	    <div  class=  "left elementoBloqueBotonesBoton opacidad cursor" style="margin-right:20px;" onclick="elementoTipo('grid','','<?=$idG?>');return false;" >
       Editar Columna<? if($columnas>1){ ?>s<? } ?>
    </div>

	
 <div  class="left elementoBloqueBotonesBoton opacidad cursor"  onclick="javascript:if (confirm('¿Desea duplicar el elemento y todo  su contenido?')){gridCopiar('<?=$idG?>','<?=$valor?>');return false;}" style="margin-right: 20px;">
   Duplicar 
 </div>
    	<? } ?>
	<? if($permisoEliminar==1) { ?>			
 <div   id="borra<?=$idG?>" class="left elementoBloqueBotonesBoton  borra"  onclick="javascript:if (confirm('¿Desea eliminar el elemento y todo  su contenido?')){eliminarE('<?=$idG?>');return false;}" style="margin-right: 10px;">
   Borrar 
 </div>
    <? } ?>
				
				

	</div>
</div>
<div class="clear"></div>

<div class="grid_<?=$anchoG?>"<? if($anchoG=="sitio") {?> style=" max-width: <?=$anchoSitio?>px;" <? } ?>>
<? if ($margenSupG>0){ ?>
<div class="margenBloque padd10" style="height:<?=$margenSupG?>px;" data-info="Margen Sup <?=$margenSupG?>px "></div>
<? } ?>

<div style="display: table; width: 100% ; min-height:50px;">
<?




//$tablaCell="block";
$tablaCell=" ";
if($columnas>1){$tablaCell="table-cell";}
//despues sus ccolumnas
 for ($i = 1; $i <= $columnas; $i++) {
	 
	 $arregloSortable[]="#sortable_".$idG."_".$i;
	 
	 //columnas
	$arregloCol=$columnasA[$i];
	$colWidth=$arregloCol['ancho'];
	$colImagen=$arregloCol['imgFondo'];
	$colBgAjuste=$arregloCol['bgAjuste'];
	$colImgContenido=$arregloCol['imgContenido'];
	$colPosX=$arregloCol['posX'];
	$colPosY=$arregloCol['posY'];
	$colColorFondo=$arregloCol['colorFondo'];
	$colClases=$arregloCol['clases'];

	 $colPadd="";
	if($arregloCol['paddT'] >0 || $arregloCol['paddR'] >0 || $arregloCol['paddB'] >0 || $arregloCol['paddL'] >0  ){
	$colPadd="padding:".$arregloCol['paddT']."px ".$arregloCol['paddR']."px ".$arregloCol['paddB']."px ".$arregloCol['paddL']."px;";
	}

	
	$colImagen=$arregloArchivos[$colImagen.'imagenFront'];
	 
	 $colElAjuste="background-repeat:".$colBgAjuste.";";
	 if($colBgAjuste=="cover" || $colBgAjuste=="contain"){ 
		 $colElAjuste="background-size:".$colBgAjuste.";";
	 }
	 
		$colAnchoRedondeo=floor($colWidth);
		
		if($anchoFijoG==1){$colAnchoRedondeo=$colAnchoRedondeo.'f';}
	 
	
	 
	 ?>
 <div class="div<?=$colAnchoRedondeo?> drop conectados <?=$colClases?>" id="sortable_<?=$idG?>_<?=$i?>" data-id="<?=$idG?>" data-pos="<?=$i?>" style="display:<?=$tablaCell?>;  border:1px dotted #CCC; vertical-align:top; background-color:<?=$colColorFondo?>; <?=$colElAjuste?> background-position:<?=$colPosX?> <?=$colPosY?>; float: left;   min-height:50px; <?=$colPadd?> background-image:url(<?=$colImagen?>);"> 
<?

$arregloGridElementos=${'arregloGridElementos'.$idG.$i};
foreach ($arregloGridElementos as $idElemento=>$tipoElemento){
include "acomodoParametros.php";
?>
<? if($flota=="centro"){ ?>
<div class="div100 textAlignCenter">
<? } ?> 
<div class="elemento div<?=$ancho?> <?=$pad?> soloSort <?=$claseFota?> scroll<?=$idElemento?>" style=" <?=$fondoElemento?> background-color:<?=$colorFondo?> <? if ($centro==1) {?> text-align:center;<? } ?>; <?=$paddElemento?>; <?=$marginElemento?> <?=$anchoFijoElemento?>" id="elemento_<?=$idElemento?>" data-id="<?=$idElemento?>">
<? if ($animacion!=""){ ?>
<div style="position:absolute; z-index:999; right:0; background-color:#666; color:#FFF; font-size:11px; padding:3px;"><?=$animacion?></div>
<? } ?>
<? if ($porFecha=="1"){ ?>
<div style="position:absolute; z-index:999; right:0; background-color:#666; color:#FFF; font-size:11px; padding:3px;"><?=$fechaI?>  <?=$fechaF?></div>
<? } ?>
<div class="elementoBotones" id="elemento_<?=$idElemento?>_controles" style="width:100%;" >
<? if($permisoReordenar==1) { ?>
      <div class="material-icons draginE botonMenu " style="float:left; cursor:move; "   title="Mover">
  drag_indicator
    </div>
	<? } ?>
	<?=$tipoElemento?>
	
	<? if($permisoEliminar==1) { ?>
     <div class="material-icons borra" style="float:right; "  onclick="javascript:if (confirm('¿Desea eliminar el elemento: <?=$tipoElemento?>?')){eliminarE('<?=$idElemento?>');return false;}" >
    clear
    </div>  
	<? } ?>
	
	<? if($permisoModificar==1) { ?>
        <div class="material-icons botonMenu" style="float: right; margin-right:10px;  margin-right:10px; "  onclick="elementoTipo('<?=$tipoElemento?>','','<?=$idElemento?>');return false;"title="Editar">
    mode_edit     
    </div>
				
					<div class="material-icons botonMenu" style="float: right; margin-right:10px;  margin-right:10px; "  onclick="javascript:if (confirm('¿Desea duplicar el elemento: <?=$tipoElemento?>?')){elementoCopiar('<?=$idElemento?>','<?=$valor?>');return false;}"  title="Copiar">
    content_copy     
    </div>
    		
	<? } ?>			
</div>
  <?
  
   include "elementos/".$tipoElemento.".php"; 
   ?> 
</div>
<? if($flota=="centro"){ ?>
</div>
<? } ?>
<?

// ciclo interior
}
?>
</div>
<? // fin de las colunmas 
}
//fin dle grid
?>
</div>
<? if ($margenInfG>0){ ?>
<div class="clear"></div>
<div class="margenBloque padd10" style="height:<?=$margenInfG?>px;" data-info="Margen Sup <?=$margenInfG?>px "></div>
<? } ?>
</div>
<? // fin del grid // ?>
</div>

<?
} ?>
<? // bloqueE?>
 </div>
 
 <? // fin del contendor // ?>
 </div>
 
 <? if ($margenInfB>0){ ?>
<div class="margenBloque" style="height:<?=$margenInfB?>px;" data-info="Margen Inf <?=$margenInfB?>px "></div>
<? } ?>
 <? // bloque ?>
</div>
<?
	}
//actuales
?>
 
 

<? 
$arregloGridsMueve=implode(',',$arregloGridsMueve);
if ($hayCuadricula==1){ 
$arregloSortable=implode(',',$arregloSortable);
?>

<input type="hidden" id="sortables" value="<?=$arregloSortable?>">
<script>
	$('.elementosPonibles').show();
	$('.elementosPonibles').css('opacity',1);
</script>
<? } 	?>

<input type="hidden" id="sortableGrids" value="<?=$arregloGridsMueve?>">

<script>
$( ".margenBloque" ).each(function() {
  var info='<div class="material-icons margenBloqueAT">keyboard_arrow_up</div><div class="material-icons margenBloqueAB">keyboard_arrow_down</div><div class="margenBloqueT">'+$(this).data('info')+'</div>';
  $( this ).append( info );
});



$(function() {
var moviste=localStorage['elemento'];
if(moviste){
 $('html, body').animate({
        scrollTop: $(".scroll"+moviste).offset().top-30
    }, 300);
	localStorage.removeItem('elemento');
}


});


</script>
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?>"></script>
 
<? 




/* guarda cache   
set_time_limit(0);
		$urlCurl = $urlA."/_contenidoMailings/muestraMail.php?v=".$valor;
	 // change to your form action url.
		$field_name = 'file'; // please edit it according to your form file field name.
		$ch = curl_init($urlCurl);
		
		$data = "";
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = base64_encode(curl_exec($ch));
		curl_close($ch);

$query1="UPDATE mailings SET cache='$result' WHERE id='$valor'";	
$mysqli->query($query1);	
		
		
		

   guarda cache */ ?>