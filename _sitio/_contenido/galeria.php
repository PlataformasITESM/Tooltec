
<? 
 $imgSlider=explode(',',$imgV);
$imgsUrls= unserialize(base64_decode($imgsUrls)); 
 
$hayGaleria=1;
$cuenta=1; 

foreach ($imgSlider as $key => $value){
	
	
	if($value!=""){
   $elArchivoT=$arregloArchivos[$value.'imagenFrontT']; 
      $elArchivo=$arregloArchivos[$value.'imagenFront']; 
 
$esteA= unserialize(base64_decode($imgsUrls[$value]));
   
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
   <div class="div<?=$filaSlider?>f padd5 hover opacidad ">
<div style="float:left; width:100%;  padding-bottom:<?=$alto?>%; position:relative; transition: all 0.2s linear; overflow:hidden;">
    <div style=" float: left; background-image:url(<?=$elArchivoT?>); width:100%; height:100%;background-size:cover; position:absolute; transition: all 0.2s linear; " > 
   
   </div>
   </div>
   </div>
 </a>
    <?
$cuenta=$cuenta+1;
	}
} ?>



<script>
$(function(){
var $gallery = $('.galeria<?=$primerNivel?> a').simpleLightbox();
});
</script>
 