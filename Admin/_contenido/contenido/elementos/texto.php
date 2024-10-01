<?
	$texto=$parametrosE['texto_es'];
	$imagenTexto=$parametrosE['imgFondo'];
	
	$bgAjuste=$parametrosE['bgAjuste'];
	$posX=$parametrosE['posX'];
	$posY=$parametrosE['posY'];
		$estilo=$parametrosE['style'];
	$bg=$arregloArchivos[$imagenTexto.'imagenFront'];
	$clases=$parametrosE['clases'];
	
	 $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
		 $elAjuste="background-size:".$bgAjuste.";";
	 }
	 
	 $textoPre=$parametrosE['textoPre'];
?>


 <div class="div100 elemento  <?=$clases?> <?=$textoPre?>" style="<?=$estilo?>">
 
 <?=$texto?> 
	
 
 </div>