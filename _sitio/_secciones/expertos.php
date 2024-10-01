<? include "../sesion/arriba.php";
$s="expertos";
$sO=$s;
$selas="SELECT * FROM secciones WHERE  (tituloC_es='$s' or url_es ='$s') AND activo='1' AND muerto='0' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$s= $fila['id'];
		$activo= $fila['activo'];
		$sO=$s;
		$tituloM= $fila['titulo_'.$idioma];
		$tituloMC= $fila['tituloC_'.$idioma];
		$tituloPagina= $fila['tituloPagina_'.$idioma];
		$metaDes= arregloSaca($fila['meta']);
		
	}

if($activo!=1){die();}
if($tituloPagina==""){$tituloPagina=$nombreSistema;} else {$tituloPagina=$tituloPagina." | ".$nombreSistema;}
?>
<!doctype html>
<html lang="<?=$idioma?>">
<head>
  <meta name="description" content="<?=$metaDes['metaDes_es']?>">
 
<meta charset="utf-8">
<title><?=html_entity_decode($tituloPagina)?></title>
 <?php
include "../control/magia.php";
include "../control/css.php";
?>
 </head>


<body>
 

<? include "../interfase/header.php"; ?>
 

<? // los contenedores // 
$s=$sO;
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>
 

<? // ?>
</div>


<? $s="footer"; include($rutaServer.'/_sitio/cache/'.$s.'.html'); ?>




<script>

<? /*
var herras=expertos['expertos'];
var cuenta=0
$.each(herras, function(key, val){
cuenta=cuenta+1;
    var apenda=''+
    '<div class="div33 padd10">'+
	'<div class="div100 categorias">'+
	'<a href="'+val.url+'"><div class="div100 ">'+
'<div class="categoriasExpertoImg" style="background-image:url('+val.img+')"></div>'+
'</div></a>'+
'<div class="div100 padd10">'+
	'<div class="clear15"></div>'+
	'<div class="div100" id="exp'+val.id+'"></div>'+
		'<div class="clear15"></div>'+
	'<a href="'+val.url+'"><div class="categoriasTitulo">'+val.nombre+'</div></a>'+
	'<div>'+val.info.ciudad+'</div>'+
	'<div class="clear15"></div>'+
	 val.info.abstract+
	 '<div class="clear15"></div>'+
    '</div>'+
	'</div>'+
	'</div>'+
    '</a>';
   
     $('#herramientasAqui').append(apenda);
 
     
	 if(cuenta % 3== 0 ){
	  $('#herramientasAqui').append('<div class="clear"></div>');
	 }
	 
});    
    
 */ ?>
</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
