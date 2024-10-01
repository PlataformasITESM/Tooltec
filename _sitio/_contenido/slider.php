
<? 
 $imgSlider=explode(',',$imgV);
$imgsUrls= unserialize(base64_decode($imgsUrls)); 
 
?>

<div class="container" style="position:relative; width:100%; max-height:<?=$alto?>px; ">
    <div class="slides" id="slides<?=$primerNivel?>">
 
<? 

$cuenta=1; 

foreach ($imgSlider as $key => $value){
	
	
	if($value!=""){
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
 
    <div  style=" background-image:url(<?=$elArchivo?>); height:100%; max-height:<?=$alto?>px; background-position:center center; background-size:cover;"  > 
   
		<div class="cont" style="height:100%;">
        <div class="contF " style="height: 100%;">
    <div class="<?=$divas?> " style="  float:<?=$flotin?>; height:100%; position: relative;"> 

<div class="silderIntTexto" style="text-align:<?=$alineSlider?>;">    
<div class="sliderIntTitulo" style="color:<?=$estaColor?>"> <?=$esteTit?></div>
		<div class="clear"></div>
 <div class="sliderIntTituloT" style="color:<?=$estaColor?>"> <?=$esteSub?></div>
  
  
  
    <? if ($estaLiga!=""){ ?>
		<div class="clear10"></div>
   <a href="<?=$estaLiga?>" target="<?=$estaTarget?>"  >
	<div class="sliderIntLiga">	ver más</div></a>
    <? } ?>
 </div> 
	</div>
			</div>
            </div>
   
   </div>
    
 
    <?
$cuenta=$cuenta+1;
	}
} ?>

<a   class="slidesjs-previous slidesjs-navigation material-icons">keyboard_arrow_left</a>
<a   class="slidesjs-next slidesjs-navigation material-icons">keyboard_arrow_right</a>
</div>
</div>


<script>
    $(function() {
      $('#slides<?=$primerNivel?>').slidesjs({
        width: 1000,
	    height: <?=$alto?>,
	    play: {
      active: false,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "fade",
        // [string] Can be either "slide" or "fade".
      interval: 5000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    },
	 effect: {
      slide: {
        // Slide effect settings.
        speed: 400
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 300,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
	 pagination: {
      active: true,
        // [boolean] Create pagination items.
        // You cannot use your own pagination. Sorry.
      effect: "fade"
        // [string] Can be either "slide" or "fade".
    },
	 navigation: {
      active: false
	 }
	   
      });
    });
  </script>
 