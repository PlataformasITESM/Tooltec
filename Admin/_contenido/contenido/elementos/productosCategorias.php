<?
	$texto=$parametrosE['texto'];
	$imagenTexto=$parametrosE['imgFondo'];
	
	$bgAjuste=$parametrosE['bgAjuste'];
	$posX=$parametrosE['posX'];
	$posY=$parametrosE['posY'];
	
	$bg=$arregloArchivos[$imagenTexto.'imagenFront'];
	$clases=$parametrosE['clases'];
	
	 $elAjuste="background-repeat:".$bgAjuste.";";
	 if($bgAjuste=="cover" || $bgAjuste=="contain"){ 
		 $elAjuste="background-size:".$bgAjuste.";";
	 }
	 

	 
?>


 <div class="div100 elemento  <?=$clases?>" style=" height: <?=$marcasAltura?>px">

Productos Categorías
 </div>
