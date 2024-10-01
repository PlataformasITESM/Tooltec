
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
	$tiempo=$parametrosE['tiempo'];
	$controles=$parametrosE['controles'];
	$filaSlider=$parametrosE['filaSlider'];
	$imgsUrls=$parametrosE['imgsUrls'];
	$altoSlider=$parametrosE['altoSlider'];
	
 
	?>		
	
	  <div class="elemento " id="slider<?=$primerNivel?>" style="width: 100%; height: <?=$alto?><?=$altoSlider?>"> 
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
     
<div class="div<?=$filaSlider?>s" style="background: url(<?=$elArchivo?>); background-size:<?=$ajusteImg?>; background-repeat;no-repeat; width;100%; height:100%;">
    </div>
 
    <?
$cuenta=$cuenta+1;
	} ?>

</div>

<script>
$(function(){

  
 
  $('#slider<?=$primerNivel?>').slick({
  <? 
  $conts="false";
  if($controles==1){  $conts="true";  } 
  ?>
  "dots":<?=$conts?>,
  "arrows":<?=$conts?>,
 
  autoplay: true,
  fade: true,
  autoplaySpeed: <?=$tiempo*1000?>,
  });
 
});
</script>

 
