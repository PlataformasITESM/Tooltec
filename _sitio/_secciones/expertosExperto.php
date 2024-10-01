<? include "../sesion/arriba.php";

$sO="experto";

$h=limpiaGet($_GET['h']);

$selas="SELECT * FROM secciones WHERE  id='experto' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		
	}



$selas="SELECT * FROM expertos WHERE  tituloC_es='$s' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$exp= $fila['id'];
		$activo= $fila['activo'];
		$nombre= $fila['titulo_'.$idioma];
		$tituloMC= "expertos";
		$tituloPagina= $nombre;
		 
	}

if($activo!=1){die();}
if($tituloPagina==""){$tituloPagina=$nombreSistema;} else {$tituloPagina=$tituloPagina." | ".$nombreSistema;}


/* guarda*/

$usas="visitante";
if($quien!=""){
$usas=$quien;
}
if($soyAdmin==""){
if( $_SESSION[$exp]==""){ $_SESSION[$exp]=$hoySt;
$queryU="insert into expertosVistas (idExperto,idUsuario, herramienta, creado, cuando) values ('$exp','$usas', '$h', '$creado', '$hoy')";
$mysqli->query($queryU);

}

$pasadoVista=($hoySt-$_SESSION[$exp])/60;
if( $pasadoVista>1){
$queryU="insert into expertosVistas (idExperto,idUsuario, herramienta, creado, cuando) values ('$exp','$usas', '$h', '$creado', '$hoy')";
$mysqli->query($queryU);
$_SESSION[$exp]=$hoySt;
}
}


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
 <input type="hidden" value="<?=$exp?>" id="exp"> 

<? include "../interfase/header.php"; ?>
 

<? // los contenedores // 
$s="experto";
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>
 
 <? // los contenedores // 
$s=$exp;
if(file_exists($rutaServer.'/_sitio/cache/'.$s.'.html')){
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
}
?>
 

<? // ?>
</div>


<? $s="footer"; include($rutaServer.'/_sitio/cache/'.$s.'.html'); ?>




<script>

 var herras=expertos['expertosRef'][$('#exp').val()];

herras=expertos['expertos'][herras];
$('#acerca').html(herras.info.acerca);
$('#expertoAva').html('<div class="avatar150" style="background-image:url('+herras.img+')"></div>');
$('#expertoLugar').html('<div class="div100"><div style="opacity:.65" class="footerUbicacion ">'+herras.info.ciudad+'</div></div>');
$('#expertoNombre').html(herras.nombre);


if(herras.info.redes.linkedin){
$('#expertoRedes').append('<div onclick="expRedes(\''+herras.id+'\',\'linkedin\',\''+herras.info.redes.linkedin+'\');" class="redes cursor opacidadI"><i class="im im-linkedin absoluteHV blanco" style="font-size:18px !important"></i></div>');
}
if(herras.info.redes.facebook){
$('#expertoRedes').append('<div onclick="expRedes(\''+herras.id+'\',\'facebook\',\''+herras.info.redes.facebook+'\');" class="redes cursor opacidadI"><i class="im im-facebook absoluteHV blanco" style="font-size:18px !important"></i></div>');
}

if(herras.info.redes.twitter){
$('#expertoRedes').append('<div onclick="expRedes(\''+herras.id+'\',\'twitter\',\''+herras.info.redes.twitter+'\');" class="redes cursor opacidadI"><i class="im im-twitter absoluteHV blanco" style="font-size:18px !important"></i></div>');
}

if(herras.info.redes.instagram){
$('#expertoRedes').append('<div onclick="expRedes(\''+herras.id+'\',\'instagram\',\''+herras.info.redes.instagram+'\');" class="redes cursor opacidadI"><i class="im im-instagram absoluteHV blanco" style="font-size:18px !important"></i></div>');
}

var apenda;
$.each(herras.cualis, function(key, val){
 apenda='<div class="div33 padd10">'+val.texto+'</div>';
$('#cualis').append(apenda);
});

$.each(herras.herramientas, function(key, val){
este=herras=expertos['herramientas'][key]
 apenda='<div class="div25 padd10"><a href="'+este.url+'">'+este.nombre+'</a></div>';
$('#herras').append(apenda);
});



<? /*
*/ ?>
</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
