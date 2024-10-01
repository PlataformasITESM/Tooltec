<?
	$img=$parametrosE['img'];	
	$ajusteImg=$parametrosE['ajusteImg'];
	$imgBorde=$parametrosE['imgBorde'];
	$ligaImg=$parametrosE['liga'];
	$imgBorde=$parametrosE['imgBorde'];
	$anchoPx=$parametrosE['anchoPx'];
	$altoPx=$parametrosE['altoPx'];
	$img=$arregloArchivos[$img.'imagenFront'];
$clases=$parametrosE['altoPx'];


	if ($ajusteImg=="100"){$elAjuste="width=\"100%\""; }
	if($ajusteImg=="max"){$elAjuste="style=\"  width:auto;  \"";}
	if($ajusteImg=="px"){
	if($anchoPx!=0){ $anchoPx="width=\"".$anchoPx."\"";}else {$anchoPx="";} 
	if($altoPx==0){ $altoPx='width="'.$altoPx.'"';} else {   $altoPx="";  }
	$elAjuste=$anchoPx." ".$altoPx;
	}
	?>			

	<div class="elemento_<?=$tipoElemento?> <?=$clases?> " style="text-align:center; ">
		 	<img <?=$elAjuste?> src="<?=$img?>" class="<?=$imgBorde?>" style="max-width: 100%;"  <? if($ligaImg!=''){ ?> title="link: <?=$ligaImg?>"<? } ?> />
	</div>