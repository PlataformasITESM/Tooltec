<? 

	$texto=$parametrosE['traduccion'][$idioma]['texto'];
	$titulo=$parametrosE['traduccion'][$idioma]['titulo'];
	$imagenTexto=$parametrosE['imgFondo'] ?? '';
	$img=$parametrosE['img'];	
	$img=$arregloArchivos[$img.'imagenFront'];
	$imgAlto=$parametrosE['imgAlto'];
	$imgAltoUnidades=$parametrosE['imgAltoUnidades'];
	$bgAjuste=$parametrosE['bgAjuste'];
	$posX=$parametrosE['posX'];
	$posY=$parametrosE['posY'];
	
	$bg=$arregloArchivos[$imagenTexto.'imagenFront'] ?? '';
	
	$clases=$parametrosE['clases'];
	$clasesT=$parametrosE['clasesT'];
	$clasesTit=$parametrosE['clasesTit'];
	$clasesI=$parametrosE['clasesI'];
	$style=$parametrosE['style'];
	$tituloPre=$parametrosE['tituloPre'];
	$textoPre=$parametrosE['textoPre'];

	 $altoImasT="height:".$imgAlto.$imgAltoUnidades;
	 if($imgAltoUnidades=="%"){
	  $altoImasT="padding-bottom:".$imgAlto.$imgAltoUnidades;
	 }
	 
	  $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
	 if($bgAjuste=="contain"){$bgAjuste="";}
	 		 $elAjuste="background-size:".$bgAjuste."; background-repeat:no-repeat;";
	 }
	?>

 <div class="div100 elemento  <?=$clases?>" style="<?=$style?>">
 
 <div class="div100"  >
 <div class="div100 <?=$clasesI?>" style="background-image: url(<?=$img?>); <?=$elAjuste?> background-position:<?=$posX?> <?=$posY?>; <?=$altoImasT?>"></div>
 </div>
 
 <? if ($titulo!=""){ ?>
 <div class="div100 <?=$clasesT?> <?=$tituloPre?> <?=$clasesTit?>"><?=$titulo?> </div>
 <? } ?>
 
 
  <? if ($texto!=""){ ?>
 <div class="div100 <?=$textoPre?> <?=$clasesTit?>"><?=$texto?> </div>
 <? } ?>
 </div>