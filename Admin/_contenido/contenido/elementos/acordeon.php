<div class="elemento ">
    
    <?
$ordenA=explode(',',$parametrosE['orden']);
$acordeones=$parametrosE['acordeones'];
	foreach ($ordenA as $ordenitoA) {
			$acordeonElemento=$acordeones[$ordenitoA];
			$tituloA=$acordeonElemento['titulo_es'];
			$colorTitulo=$acordeonElemento['colorTitulo'];
 
			
	 
	?>
    <div class="elemento_acordeon" style="display:table; width:100%; background-color:<?=$colorTitulo?>;">
    <div class="tableCell padd5"  >
    <?=$tituloA?>
    </div>
    <div  class="tableCell material-icons padd5" style="width:50px; white-space:nowrap; float:right; ">keyboard_arrow_up</div>
    
    </div>
 <div class="div"></div>
	<?			
	}			
	?>
</div>