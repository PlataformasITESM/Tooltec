<? $selas="SELECT * FROM sitio";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$anchoSitio= $fila['ancho'];
	$actualizacion= $fila['actualizacion'];
	$google=base64_decode($fila['google']);
	$fuentes= unserialize($fila['fuentes']);
}




foreach($fuentes as $fun=>$das) {
$das=str_replace(' ','+',$das);
 echo '<link  href="https://fonts.googleapis.com/css2?family='.$das.'" rel="stylesheet">';
}
?>
<link rel="stylesheet" type="text/css" href="<?=$url?>/js2/siteCSS.css?a=a<?=$actualizacion?>"/>
<link rel="stylesheet" type="text/css" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css"/>
<script type="text/javascript" src="<?=$url?>/js2/siteJS.js?a=<?=$actualizacion?>"></script>
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
<script src="<?=$url?>/js2/expertos.js?u=<?=$actualizacion?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-219946539-1"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P769VHD89Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'G-P769VHD89Q');
</script>
