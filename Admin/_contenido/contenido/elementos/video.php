<?
	$video=$parametrosE['video_es'];
	$altoV=$parametrosE['alto'];
	$videoYt=$parametrosE['videoYt']['es'];
	
	
	$videosCuantos=count($videoYt);
 
?>


 <div class="div100 elemento  <?=$clases?>" style="<?=$style?>; padding-bottom:<?=$altoV?>%">
 
<div class="absolute" style="width: 100%; height: 100%;">
<? if($videosCuantos<2){ ?>

<? if (strpos($video,'facebook') !== false) { ?>
	<iframe   src="https://www.facebook.com/plugins/video.php?href=<? echo urlencode($video)?>%2F&show_text=0" width="100%"  height="100%"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
	<? } ?>


<? if (strpos($video,'vimeo') !== false) { 
		$video=explode('/',html_entity_decode  ($video));
		$video=end($video);
?>
	<iframe    src="https://player.vimeo.com/video/<?=$video?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<? } ?>
	
	
<? if (strpos($video,'youtube') !== false) { 
	$video=explode('=',html_entity_decode  ($video))[1];
	$video=explode('&',$video);
	$video=$video[0];
?>
	<iframe     width="100%" height="100%" src="https://www.youtube.com/embed/<?=$video?>" frameborder="0" allowfullscreen></iframe>
	<? } ?>
<? } else { 
 
?>	 

 <div class="videoGaleriaIzq" style="  " id="videoGaleria<?=$id?>">

 <iframe     width="100%" height="100%" src="https://www.youtube.com/embed/<?=array_key_first($videoYt)?>" frameborder="0" allowfullscreen></iframe>
 </div>

 
 <div class="videoGaleriaDerecha" style="">
 
<? foreach($videoYt as $vide=>$videon){ 
?>
<div class="div100 videoGaleriaThumb opacidadI" style="background-image: url(<?=$videon['thumbnail_url']?>)"  >
 <div class="videoGaleriaTit"><?=$videon['title']?></div>
</div>
<? } ?>
</div>
<? } ?>

</div>
</div>