<? include "../sesion/arriba.php";

$sO="blogPost";
$selas="SELECT * FROM secciones WHERE  id='blogPost' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		
	}

$selas="SELECT * FROM blogs WHERE  tituloC='$s' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$exp= $fila['id'];
		$activo= $fila['activo'];

		$meGusta= $fila['meGusta'];
		$comentarios= $fila['comentarios'];
		$nombre= $fila['titulo'];
		$tituloMC= "blog"; 
		$tituloPagina= $nombre;
		 
		 if($meGusta<1){$meGusta="";}
	}

if($activo!=1){die('<script>top.location.href="/"</script>');}

if($tituloPagina==""){$tituloPagina=$nombreSistema;} else {$tituloPagina=$tituloPagina." | ".$nombreSistema;}


/* guarda*/
$usas="visitante";
if($quien!=""){
$usas=$quien;

//los likes

$este=$exp.$quien;
$teGusta="";
$selas="SELECT * FROM blogsLikes WHERE id='$este' and meGusta='1'";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$teGusta=1;	
	
		}
//


}

if($soyAdmin==""){
if( $_SESSION[$exp]==""){ 
$_SESSION[$exp]=$hoySt;
$queryU="insert into blogsVistas (idHerramienta,idUsuario, creado, cuando) values ('$exp','$usas', '$creado', '$hoy')";
$mysqli->query($queryU);
}
$pasadoVista=($hoySt-$_SESSION[$exp])/60;
if( $pasadoVista>1){
$queryU="insert into blogsVistas (idHerramienta,idUsuario, creado, cuando) values ('$exp','$usas', '$creado', '$hoy')";
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
$s="blogPost";
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>
 
<? // los contenedores // 
$s=$exp;
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>

<? // ?>
<div class="clear20"></div>
<div class="cont"><div class="contF">
<div class="div100 tituloSmall">Sobre el experto</div>
<div class="rayita15"></div>
<div class="div100">
    <div class="expertoIzq ">
    <div class="expertoIzqDiv" id="expertoAva"></div>  
    <div class="clear10"></div>
    <div class="expertoIzqDiv" id="expertoLugar"></div>    
    </div>
    
    <div class="expertoDerecha  padd5">
        <div class="clear10"></div>
    <div class="div100 tituloSmall bold" id="expertoNombre"></div>  
    <div class="clear10"></div>
     <div class="div100" id="expertoAbs"></div>
    </div>
</div>

<div class="lineaRosa"></div>

<div class="clear20" id="comentaAqui"></div>


<div class="div100 tituloSmall" id="comentaCuenta" >Comentarios (<?=$comentarios?>)</div>



<? if($quien=="") { ?>
<div class="div100 padd10">
Es necesario estar registrado para poder comentar. Puedes <a class="rosa opacidad" onClick="login()">iniciar sesión aqui</a>
</div>
<? } ?>

<? if($quien!="") { ?>
<div class="div100 padd10" id="comentaDiv">
<textarea name="comentar" id="comentar"></textarea> 
<div class="clear10"></div>
<div class="botonEnviar right" onClick="comentaB('<?=$exp?>','');">Enviar comentario</div>
</div>
<? }  ?>

<div class="div100" id="comentones">
<? include "blogsComentarios.php" ?>

</div>


</div></div>



<? $s="footer"; include($rutaServer.'/_sitio/cache/'.$s.'.html'); ?>



<script>



$(function() {

pon="";
curo="default";
colo="";
title="Inicia sesión";
ics="favorite_border";
<? if($quien!=""){ ?>
pon=' onclick="favoritoB(\'<?=$exp?>\');" ';
curo=" cursor ";
title="";
<? if($teGusta!=""){ ?>ics="favorite"; colo="rosa" <? } ?>

<? } ?>
var apenda='<div id="corazonMelon" style="margin-right:20px; display:inline-block"><div' +pon+' class="corazon material-icons '+colo+' ' +curo+'" title="'+title+'" style="font-size:30px">'+ics+'</div><?=$meGusta?></div>'+
'<div onclick="avanza()" style="margin-right:20px; display:inline-block"><div class="material-icons cursor" style="font-size:30px">chat_bubble_outline</div><?=$comentarios?></div>';
$('.herramientasVota').html(apenda);
});


function avanza(){
$('html, body').animate({
        scrollTop: $("#comentaAqui").offset().top
    }, 500);
}

$(function() {

$('#herramientasBannerCont').append('<a href="/blog"><div class="herramientasBack">< volver al blog</div></a>')

var herras=expertos['blogsRef'][$('#exp').val()];
herras=expertos['blogs'][herras];
$('#herramientasBanner').css('background-image', 'url(' + herras.imgB + ')');
$('#herramientaNombre').html(herras.titulo);
 
 
	 este=expertos['expertosRef'][herras.experto]
	 if(este){
	  este=expertos['expertos'][este]
	 
	 var apendaE='<div id="categoriasExperto">'+
	 '<a href="'+este.url+'">'+
	 '<div class="left avatarDiv"><div class="avatar30"><img src="'+este.img+'" height="100%"></div><div class="avatarT30"> ' +este.nombre+'</div></div></a>'+
	 '</div>';
	 $('#herramientaExperto').append(apendaE);
	 
	 $('#expertoAva').html('<div class="avatar150" style="background-image:url('+este.img+')"></div>');
	  $('#expertoNombre').html('<a href="'+este.url+'"  >'+este.nombre+'</a>');
	  $('#expertoAbs').html(este.info.abstract);
	 
	 }
	



})


</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
