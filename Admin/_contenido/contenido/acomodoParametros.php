<?
	$parametrosE=arregloSaca($arregloParametros[$idElemento]);
    $ancho=$parametrosE['ancho'];
	$colorFondo=$parametrosE['colorFondo'];
	$flota=$parametrosE['flota'];
	
	$porFecha=$parametrosE['porFecha'];
	$fechaI=$parametrosE['fechaI'];
	$fechaF=$parametrosE['fechaF'];
	
	$alineacionV=$parametrosE['alineacionV'];
	$animacion=$parametrosE['animacion'];
	
	$animaClass="";
	if($animacion!=""){$animaClass="animacion";}

	$paddElemento= "padding:".$parametrosE['paddT']."px ".$parametrosE['paddR']."px ".$parametrosE['paddB']."px ".$parametrosE['paddL']."px;";
	$marginElemento="margin:".$parametrosE['marginT']."px 0  ".$parametrosE['marginB']."px 0;";
	
	
	if($flota=="left"){
	$claseFota="left";
	}
	
	if($flota=="right"){
	$claseFota="right";
	}
	if($flota=="centro"){
	$claseFota="centro";
	$marginElemento="";
	}
	if($alineacionV=="medio"){
	$claseFota="absoluteV";
	}
	
	if($alineacionV=="abajo"){
	$claseFota="absoluteB";
	}
	
	
	//fondo
	$fondoElemento="";
	$llevaImagenElemento=$parametrosE['imagen'];
	
	if($llevaImagenElemento==1){
	$imagenElemento=$parametrosE['imgFondo'];
	
	$bgAjuste=$parametrosE['bgAjuste'];
	$posX=$parametrosE['posX'];
	$posY=$parametrosE['posY'];
	
	$bg=$arregloArchivos[$imagenElemento.'imagenFront'];
	
	
	
	 $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
		 $elAjuste="background-size:".$bgAjuste."; background-repeat:no-repeat;";
	 }
	 $fondoElemento="background-image:url(".$bg."); background-position:".$posX." ".$posY."; ".$elAjuste;
	 
	 }
	 $anchoFijoElemento="";
	 if($ancho=="fijoPx") {$anchoFijoElemento="width: auto";}
	
	
// print_r($parametrosE);
	
	?>