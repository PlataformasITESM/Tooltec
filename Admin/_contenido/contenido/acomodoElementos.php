<? /**** */
	if ($tipoElemento=="slider") { 
	
	$estaImagen=explode(',',$imgV);
	$estaImagen=$estaImagen[0];
	$estaImagen=$arregloArchivos[$estaImagen.'imagenFront'];
	
	?>
    <div class="elemento elementoSlider" style="height:<?=$alto?>px; background-image:url(<?=$estaImagen?>); background-size:cover; background-position:center center;">
  
  <div class="elementoSliderFI material-icons"> keyboard_arrow_left </div>
  <div class="elementoSliderFD material-icons"> keyboard_arrow_right </div>
  
    </div>
    <? } 
	 /**** */?>
    <? /**** */
	if ($tipoElemento=="banner") { ?>
 
 
  <div class="elemento elementoBanner" style="height:<?=$alto?>px; background-image:url(<?=$img?>); background-size:cover; background-position:center center; position:relative;">
 <div class="elementoBannerInterno"> 
 
 <div class="elementoBannerTit" style="background-color:<?=$colorTitulo?>">
  <?=$titulo?>
  </div>
  <div class="clear10"></div>
 <div class="elementoBannerText" style="background-color:<?=$colorTexto?>"> 
  <?=$texto?>
  </div>
  
  </div>
 
    </div>
    <? } 
	 /**** */?>
 <? /**** */
	if ($tipoElemento=="file") { ?>     
    
    <div class="elementoFile">
     <div class="tableCell padd5" style="width:50px;"><img src="<?=$icon?>" style="max-width:40px; max-height:40px;"></div>
     <div class="tableCell padd5"> <?=$texto?></div>
     </div>
     
    <? } 
	 /**** */?>  
     
       <? /**** */
	if ($tipoElemento=="acordeon") { ?>
    <div class="elemento ">
    
    <? foreach ($ordenA as $ordenitoA) {
			$acordeonElemento=$acordeones[$ordenitoA];
			$tituloA=$acordeonElemento['titulo'];
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
    <? } 
	 /**** */?>
    <? /**** */
	if ($tipoElemento=="codigo") { ?>
    <div class="elemento ">
    Código: <?=$tituloCodigo?><br>
    
    </div>
    <? } 
	 /**** */?>
    
    
    <? /**** */
	if ($tipoElemento=="producto") { 
									
		$selas="SELECT * FROM catalogosProds WHERE  id='$producto'  LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$prod= $fila['titulo'];
	$skuT= $fila['sku'];
	$info= arregloSaca($fila['info']);

	$img= $fila['images'] ;
	$imgArreglo=explode(',',$img);
	
	$tagsM= $fila['tags'];
	}
	
	$img=$imgArreglo[0];
	$elArchivo=$arregloArchivos[$img.'imagenFront']; 


?>
    <div class="elemento ">
    
		    <div class="categorias">
 
		<div class="categoriasImg" style="background-image: url(<?=$elArchivo?>);"></div>
    <div class="categoriasTitulo">
    <?=$prod?>
		</div>
   
    <div class="categoriasSku">
    <?=$skuT?>
		</div>
   
    </div>

    </div>
    <? } 
	 /**** */?>
     <? /**** */
	  if ($tipoElemento=="divisor") { 
	  $altoO=$alto;
    $alto=$alto/2;
	?>

        <div class="elemento_<?=$tipo?><?=$linea?>" style=" height:1px; text-align: center; margin-top:<?=$alto?>px; margin-bottom:<?=$alto?>px;">
		Divisor <?=$altoO?>
		</div>
    <? }
	 /**** */?>
    <? /**** */?>
   <? if ($tipoElemento=="encuesta") { 
	
	$res6 = $mysqli->query("SELECT * FROM encuestas WHERE id='$idRegistro' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idRegistro= $fila['id'];
	$registro= $fila['titulo'];
	}	
	?>
    <div class="elemento " style="min-height:300px; background-color:#EBEBEB;">
    <?=$texto?><br>

    Encuesta: <?=$registro?> 
    </div>
    <? } ?> 
    <? /**** */?>
   <? if ($tipo=="registro") { 
	 
	$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$idRegistro' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idRegistro= $fila['id'];
	$registro= $fila['titulo'];
	}
	
	?>
    <div class="elemento " style="min-height:300px; background-color:#EBEBEB;">
    <?=$texto?><br>

    Registro: <?=$registro?> 
    </div>
    <? } ?>
  <? /**** */  
  if ($tipoElemento=="img") {

	$img=$parametrosE['img'];	
	$ajusteImg=$parametrosE['ajusteImg'];
	$imgBorde=$parametrosE['imgBorde'];
	$ligaImg=$parametrosE['liga'];
	$imgBorde=$parametrosE['imgBorde'];
	
	$img=$arregloArchivos[$img.'imagenFront'];
	?>				
		<div class="elemento_<?=$tipoElemento?> elemento" style="text-align:center;">
				<img src="<?=$img?>" class="<?=$imgBorde?>" <? if ($ajusteImg=="100"){ ?> width="100%" <? } else {?> style=" max-width:100%;   "<? } ?> <? if($ligaImg!=''){ ?> title="link: <?=$ligaImg?>"<? } ?> />
		</div>

<? } ?> 



 <? if ($tipoElemento=="texto") {
		$texto=$parametrosE['texto'];
	 ?>
        <div class="div100 elemento ">
        <?=$texto?> 
        </div>
    <? } ?>
	
	
<? if ($tipoElemento=="textoImagen") { 

	$img=$parametrosE['img'];	
	$ajusteImg=$parametrosE['ajusteImg'];
	$imgBorde=$parametrosE['imgBorde'];
	$colorFondo=$parametrosE['colorFondo'];
	$estiloTextoImagen=$parametrosE['estiloTextoImagen'];
	$titulo=$parametrosE['titulo'];
	$texto=$parametrosE['texto'];

	$img=$arregloArchivos[$img.'imagenFront'];

	?>
    <div class="elemento_<?=$tipoElemento?> elemento" style="background-color:<?=$colorF?>; float:left; width:100%;" >
 <? if ($estiloTextoImagen=="normal"){ ?>
    <div style="float:left; width:100%; text-align:center;">
 
    <img class="textoImagenImagen <?=$imgBorde?>"  src="<?=$img?>" style="height:auto;  width:auto; max-width:100%;" />
    </div>
    <div class="clear10"></div>
     <div class="textoImagenTitulo">
    <?=$titulo?>
    </div>
    <div class="div"></div>
    <div style="float:left; width:100%;">
    <?=$texto?>
     </div>
 <? } ?>   
 
  <? if ($estiloTextoImagen=="boton"){ ?>
  <div style="float:left; width:100%;  padding-bottom: 65%; position:relative; background-image:url(<?=$img?>); background-size:cover;" class="<?=$imgBorde?>">
  <div class="textoImagenTitulo1">
  <?=$titulo?>
  </div>
  
  
  </div>
  <? } ?>
 
 
    
    </div>
    
    
      <? } 
	  /**** */ ?>
	<? /**** */  
	if ($tipoElemento=="titulo") { 
	$texto=$parametrosE['texto'];
	$sub=$parametrosE['sub'];
	
	?>
    <div class="elemento_<?=$tipoElemento?><?=$sub?> div100 elemento">
    <?=$texto?>
    </div>
    <? } 
	/**** */ ?>
    <? /**** */
	 if ($tipoElemento=="video") { ?>
    <div class="elemento_<?=$tipo?>">

<? 
 $alturaVideo=$ancho*4;	
	//es vimeo?
	if (strpos($video,'vimeo') !== false) {
		$video=explode('/',html_entity_decode  ($video));
		$video=end($video);
		
		$videoF='<iframe sandbox="allow-scripts allow-same-origin allow-forms" src="https://player.vimeo.com/video/'.$video.'" width="100%" height="'.$alturaVideo.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	//es youtube
	if (strpos($video,'youtube') !== false) {
	$video=explode('=',html_entity_decode  ($video));
	$video=end($video);
	$videoF='<iframe sandbox="allow-scripts allow-same-origin allow-forms" width="100%" height="'.$alturaVideo.'" src="https://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe>';
	}
 ?>
 <?=$videoF?>
    </div>

    <? }
	/**** */ ?>