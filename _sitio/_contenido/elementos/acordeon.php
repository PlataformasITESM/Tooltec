  <div class="elemento ">
    
    <? 
	$ordenA=explode(',',$parametrosE['orden']);
$acordeones=$parametrosE['acordeones'];

$claseTitulo=$parametrosE['claseTitulo'];
$claseTexto=$parametrosE['claseTexto'];
	
	foreach ($ordenA as $ordenitoA) {
	$acordeonElemento=$acordeones[$ordenitoA];
			$tituloA= $acordeonElemento['titulo_'.$idioma];
			$colorTitulo=$acordeonElemento['colorTitulo'];
			
			$textoA=$acordeonElemento['texto_'.$idioma];
			$colorTexto=$acordeonElemento['colorTexto'];
			
			$ordenitoA=$idElemento."_".$ordenitoA;
	 
	?>
        <div class="elemento_acordeon opacidadI bajaAcordeon acordeon_<?=$primerNivel?>_<?=$colapsa?> <?=$claseTitulo?>" id="acorderon_<?=$ordenitoA?>" data-elemento="<?=$primerNivel?>" data-id="acorderon_<?=$ordenitoA?>">
    <div class="elemento_acordeon_titulo <?=$claseTitulo?>" style="display:table; width:100%; background-color:<?=$colorTitulo?>;" data-toggle="collapse" data-parent="#acorderon_<?=$ordenitoA?>">
    <div class="tableCell padd10 "  >
    <?=$tituloA?>
    </div>
    <div id="acorderon_<?=$ordenitoA?>_flecha"  class="tableCell material-icons padd5 " style="width:50px; white-space:nowrap;   ">add</div>
    
    </div>
    </div>
    <div class="clear5"></div>
    
    <div class="elemento_acorderon_contenido acordeon_<?=$primerNivel?>_<?=$colapsa?>_contenido <?=$claseTexto?>" id="acorderon_<?=$ordenitoA?>_contenido" style="background-color:<?=$colorTexto?>">
    <?=$textoA?>
     <div class="clear5"></div>
    </div>
    
	<?			
	}			
	?>
    
    </div>