<?
	$texto=$parametrosE['texto_'.$idioma];
	$clases=$parametrosE['clases'];
	$estilo=$parametrosE['style'];
$divTipo=$parametrosE['divTipo'];
$textoPre=$parametrosE['textoPre'];
if($divTipo==""){$divTipo="div";}
?>
 <<?=$divTipo?>  class="<?=$textoPre?> div100 elemento <?=$clases?>  " style="<?=$estilo?>"    >
 <?=$texto?> 
 </<?=$divTipo?> >