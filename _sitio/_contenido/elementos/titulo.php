<?

$texto=$parametrosE['texto_'.$idioma];
	$sub=$parametrosE['sub'];
	$clases=$parametrosE['clases'];
$divTipo=$parametrosE['divTipo'];
$tituloPre=$parametrosE['tituloPre'];

if($divTipo==""){$divTipo="div";}
	
	?>
    <<?=$divTipo?> class="<?=$tituloPre?> <?=$tipoElemento?><?=$sub?> div100 elemento <?=$clases?>">
    <?=$texto?>
    </<?=$divTipo?>>