  <div class="elemento galeria<?=$primerNivel?>">
<?
$hayGaleria=1;
	$img=$parametrosE['img'];	
	$ajusteImg=$parametrosE['ajusteImg'];
	$imgBorde=$parametrosE['imgBorde'];
	$ligaImg=$parametrosE['liga'];
	$imgBorde=$parametrosE['imgBorde'];
	$anchoPx=$parametrosE['anchoPx'];
	$alto=$parametrosE['alto'];
	$imgV=$parametrosE['img'];
	$filaSlider=$parametrosE['filaSlider'];
	$imgsUrls=$parametrosE['imgsUrls'];
	?>			
<? 
 $imgV=explode(',',$imgV);


$cuenta=1; 

foreach ($imgV as $key){

	
 
$elArchivo=$arregloArchivos[$key.'imagenFront']; 
$esteA= $imgsUrls[$value];
   
	$esteTit=$esteA['tit'];
	$esteSub=$esteA['sub'];
	$estaLiga=$esteA['url'];
	$estaColor=$esteA['color'];
	$ligaTarget=$esteA['ligaTarget'];
	$ladoSlide=$esteA['ladoSlide'];
		
		$divas="div50Slider";
		$flotin="";
		$alineSlider="left";
		if($ladoSlide=="centro"){ $divas="div100"; $alineSlider="center";}
		if($ladoSlide=="izq"){ $flotin="left";}
		if($ladoSlide=="der"){ $flotin="right";}
	
   ?>
      <a href="<?=$elArchivo?>">
<div class="div<?=$filaSlider?>g hover padd10">
<div style="float:left; width:100%;  padding-bottom:<?=$alto?>%; position:relative; transition: all 0.2s linear; overflow:hidden;">
<div style=" float: left; background-image:url(<?=$elArchivo?>); width:100%; height:100%;background-size:cover; position:absolute; transition: all 0.2s linear; " > 
   
   </div>
   </div>
   </div>
 </a>
    <?
$cuenta=$cuenta+1;
	} ?>

</div>

<script>
$(function(){
var $gallery = $('.galeria<?=$primerNivel?> a').simpleLightbox();
});
</script>

 
