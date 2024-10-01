<?
	$parametrosE=arregloSaca($arregloParametros[$idElemento]);
    $ancho=$parametrosE['ancho'] ?? '';
	$colorFondo=$parametrosE['colorFondo'] ?? '';
	$animacion=$parametrosE['animacion'] ?? '';
	
	
	$porFecha=$parametrosE['porFecha'] ?? '';
	$fechaEleI=$parametrosE['fechaI'] ?? '';
	$fechaEleF=$parametrosE['fechaF'] ?? '';
	
	
	$granLigaE=$parametrosE['granLiga'] ?? '';
	$granDestinoE=$parametrosE['granDestino'] ?? '';
	$animaClass="";
	if($animacion!=""){$animaClass="animacion";}
	
	
	$flota=$parametrosE['flota'] ?? '';
	$anchoFijo=$parametrosE['anchoFijo'] ?? '';
	$alineacionV=$parametrosE['alineacionV'] ?? '';
	
	$paddT=$parametrosE['paddT'] ?? '0';
	$paddR=$parametrosE['paddR'] ?? '0';
	$paddB=$parametrosE['paddB'] ?? '0';
	$paddL=$parametrosE['paddL'] ?? '0';
	
	$marginT=$parametrosE['marginT'] ?? '0';
	$marginB=$parametrosE['marginB'] ?? '0';
	
	$paddElemento= "padding:".$paddT."px ".$paddR."px ".$paddB."px ".$paddL."px;";
	$marginElemento="margin:".$marginT."px 0  ".$marginB."px 0;";
	
	
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
	
	
	// las imagnes
	
	$fondoElemento="";
	$llevaImagenElemento=$parametrosE['imagen'] ?? '';
	
	if($llevaImagenElemento==1){
	$imagenElemento=$parametrosE['imgFondo'] ?? '';
	
	$bgAjuste=$parametrosE['bgAjuste'] ?? '';
	$posX=$parametrosE['posX'] ?? '';
	$posY=$parametrosE['posY'] ?? '';
	
	$bg=$arregloArchivos[$imagenElemento.'imagenFront'] ?? '';
	
	
	
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