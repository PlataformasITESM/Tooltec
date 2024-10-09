<?
	$video=$parametrosE['video_es'];
	$altoV=$parametrosE['alto'];
	$videoYt=$parametrosE['videoYt']['es'];
	
	
	$videosCuantos=count($videoYt);
 
?>


 <div class="div100 elemento <? if($videosCuantos>1){ ?> videoGal <? } ?> <?=$clases?>" style="<?=$style?>; padding-bottom:<?=$altoV?>%">
 
<div class="absolute" style="width: 100%; height: 100%; z-index: 1">
<? if($videosCuantos<2){ ?>

<? if (strpos($video,'facebook') !== false) { ?>
	<iframe sandbox="allow-scripts allow-same-origin allow-forms"   src="https://www.facebook.com/plugins/video.php?href=<? echo urlencode($video)?>%2F&show_text=0" width="100%"  height="100%"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
	<? } ?>


<? if (strpos($video,'vimeo') !== false) { 
		$video=explode('/',html_entity_decode  ($video));
		$video=end($video);
?>
	<iframe sandbox="allow-scripts allow-same-origin allow-forms"    src="https://player.vimeo.com/video/<?=$video?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<? } ?>
	
	
<? if (strpos($video,'youtube') !== false) { 
	$video=explode('=',html_entity_decode  ($video))[1];
	$video=explode('&',$video);
	$video=$video[0];
?>
	<iframe sandbox="allow-scripts allow-same-origin allow-forms"     width="100%" height="100%" src="https://www.youtube.com/embed/<?=$video?>" frameborder="0" allowfullscreen></iframe>
	<? } ?>
<? } else { 
 
?>	 
 <div class="videoGaleriaIzq" style="  " id="videoGaleria<?=$idE?>">

 <iframe sandbox="allow-scripts allow-same-origin allow-forms"     width="100%" height="100%" src="https://www.youtube.com/embed/<?=array_key_first($videoYt)?>" frameborder="0" allowfullscreen></iframe>
 </div>

 
 <div class="videoGaleriaDerecha" style="">
 
<?

$cuentaV=0;
foreach($videoYt as $vide=>$videon){ 

if($videon['title']!=""){
?>
<div class="div100 videoGaleriaThumb videoGaleriaThumb<?=$idE?> <? if($cuentaV==0){ ?>videoGaleriaThumbP<? } ?> opacidadI" id="videoGaleriaThumb<?=$vide?>" style="background-image: url(<?=$videon['thumbnail_url']?>)" onClick="videoGaleria('<?=$idE?>','<?=$vide?>')"  >
 <div class="videoGaleriaTit"><?=$videon['title']?></div>
</div>
<? 
$cuentaV=$cuentaV+1;
} }?>
</div>
<? } ?>
</div>

</div>

