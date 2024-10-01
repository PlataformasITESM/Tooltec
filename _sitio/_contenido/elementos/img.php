<?
	$img=$parametrosE['img'];	
	$ajusteImg=$parametrosE['ajusteImg'];
	$imgBorde=$parametrosE['imgBorde'];
	$ligaImg=$parametrosE['liga'];
	$imgBorde=$parametrosE['imgBorde'];
	$clases=$parametrosE['clases'];
	$anchoFijo=$parametrosE['anchoFijo'];
	$anchoPx=$parametrosE['anchoPx'];
	
	
	$liga=$parametrosE['liga_'.$idioma];
	$ligaTarget=$parametrosE['ligaTarget'];
	$imgT=$arregloArchivos[$img.'imagenFrontT'];
	$img=$arregloArchivos[$img.'imagenFront'];
	
	$video=$liga;
	//$elAjuste="width=\"100%\"";
	if ($ajusteImg=="100"){$elAjuste="width=\"100%\""; }
	if($ajusteImg=="max"){$elAjuste="style=\"  width:auto;  \"";}
		if($ajusteImg=="px"){
	if($anchoPx!=0){ $anchoPx="width=\"".$anchoPx."\"";}else {$anchoPx="";} 
	if($altoPx==0){ $altoPx='width="'.$altoPx.'"';} else {   $altoPx="";  }
	$elAjuste=$anchoPx." ".$altoPx;
	}
	 
	$soy="";
	
	if($ligaTarget=="Video"){
	$soy="";
	if (strpos($video,'facebook') !== false) {
	$soy="facebook";
	}
	if (strpos($video,'vimeo') !== false) {
	$soy="vimeo";
		$video=explode('/',html_entity_decode  ($video));
		$video=end($video);
	}
	if (strpos($video,'youtube') !== false) {
	$soy="youtube";
	$video=explode('=',html_entity_decode  ($video));
	$video=end($video);
	}
	}
//print_r($parametrosE);	
?>
 <div class="div100 elemento <?=$clases?>  "    >
 
 <? if($liga!="") { ?> <a href="<?=$liga?>" target="<?=$ligaTarget?>"><? } ?>
<img src="" data-src="<?=$img?>" data-srcm="<?=$imgT?>" style="max-width: 100%;" class="<?=$imgBorde?> imas imagenesLoad" <?=$elAjuste?> <? if($ligaImg!=''){ ?> title="link: <?=$ligaImg?>"<? } ?> />
<? if($liga!="") { ?></a><? } ?>
	</div>
 