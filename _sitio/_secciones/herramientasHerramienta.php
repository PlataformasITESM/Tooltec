<? include "../sesion/arriba.php";

$sO="herramienta";
$selas="SELECT * FROM secciones WHERE  id='herramienta' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		
	}


$selas="SELECT * FROM herramientas WHERE  tituloC_es='$s' LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$exp= $fila['id'];
		$activo= $fila['activo'];
		$tituloC= $fila['tituloC_es'];

		$meGusta= $fila['meGusta'];
		$comentarios= $fila['comentarios'];
		$nombre= $fila['titulo_'.$idioma];
		$tituloMC= "herramientas";
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
$selas="SELECT * FROM herramientasLikes WHERE id='$este' and meGusta='1'";
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
$queryU="insert into herramientasVistas (idHerramienta,idUsuario, creado, cuando) values ('$exp','$usas', '$creado', '$hoy')";
$mysqli->query($queryU);
}
$pasadoVista=($hoySt-$_SESSION[$exp])/60;
if( $pasadoVista>1){
$queryU="insert into herramientasVistas (idHerramienta,idUsuario, creado, cuando) values ('$exp','$usas', '$creado', '$hoy')";
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
$s="herramienta";
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>
 
<? // los contenedores // 
$s=$exp;
include($rutaServer.'/_sitio/cache/'.$s.'.html'); 
?>

<? // ?>

<div class="clear50"></div>


<div class="cont" id="lasDescargas"><div class="contF">
<div class="div100 tituloSmall" >Descargas</div>
<div class="rayita15"></div>

<? if($quien=="") { ?>
<div class="div100 padd10" id="descargaAviso" style="display: none;">
Es necesario estar registrado para poder descargar. Puedes <a class="rosa opacidad" onClick="login()">iniciar sesión aqui</a>
</div>
<? } ?>

<?
$selas="SELECT * FROM herramientasDescargas WHERE idHerramienta='$exp' and muerto='0' order by orden asc";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$idDes=$fila['id'];
		$tituloD=$fila['titulo'];
		?>
		 <div class="herraDown left    cursor " <? if($quien!="") { ?> onClick="descarga('<?=$idDes?>','<?=$quien?>')" <? } else { ?> onClick="descarga('<?=$idDes?>','')" <? } ?> ?>>
		<?=$tituloD?>
		</div>
		<?
	
}
?>

</div></div>


<div class="clear50"></div>

<div class="cont"><div class="contF">
<div class="div100 tituloSmall" id="sobreExper"></div>
<div class="rayita15"></div>

<div id="losExpertones" class="div100"></div>
 

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
<div class="botonEnviar right" onClick="comenta('<?=$exp?>','');">Enviar comentario</div>
</div>
<? }  ?>

<div class="div100" id="comentones">
<? include "herramientasComentarios.php" ?>

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
pon=' onclick="favorito(\'<?=$exp?>\');" ';
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

$('#herramientasBannerCont').append('<a href="/herramientas"><div class="herramientasBack">< volver a herramientas</div></a>')

var herras=expertos['herramientasRef'][$('#exp').val()];
herras=expertos['herramientas'][herras];
$('#herramientasBanner').css('background-image', 'url(' + herras.imgB + ')');
$('#herramientaNombre').html(herras.nombre);
$('#queEs').html(herras.info.abstract);
$('#cuando').html(herras.info.cuandoUsar);

var difi="Bajo";
if(herras.info.dificultad==2){difi="Medio";} else
if(herras.info.dificultad==3){difi="alto";}


$('#herraOtras').append('<div class="left padd5"><div class="herraNivel"><strong>Nivel de dificultad</strong>: '+difi+'</div></div>');
$('#herraOtras').append('<div class="left padd5"><div class="herraTiempo left"><strong>Tiempo</strong>: '+herras.info.tiempo+'</div></div>');
$('#herraOtras').append('<div class="left padd5"><div class="herraOtras left"><strong>Otras consideraciones</strong>: '+herras.info.consideraciones+'</div></div>');

var apenda;
$.each(herras.pasos.material, function(key, val){
if(val.tipo=="texto"){
 apenda='<div class="div100  "><label class="div100"><input id="c'+key+'" onclick="guardaCheck(\''+key+'\')" type="checkbox">'+val.texto+'</label></div>';
}
if(val.tipo=="titulo"){
 apenda='<div class="div100 bold padd5 ">'+val.texto+'</div>';
}

$('#materiales').append(apenda);
});

var cuenta=1;
$.each(herras.pasos.paso, function(key, val){
if(val.tipo=="texto"){
 apenda='<div class="left  "><label class="div100"><input id="c'+key+'" onclick="guardaCheck(\''+key+'\')"  type="checkbox"><div class="absolute bold" style="width:20px; text-align:right">'+cuenta+'.</div><div class="left" style="padding-left:30px"> '+ val.texto+'</div></label></div>';
 cuenta=cuenta+1;
}
if(val.tipo=="titulo"){
cuenta=1;
 apenda='<div class="div100 bold padd5 ">'+val.texto+'</div>';
}

$('#pasos').append(apenda+'<div class="clear"></div>');
});


	 herrasExp=herras.expertos;
	 var cuentaExp=0;
	 $.each(herrasExp, function(keyE, valE){
	 este=expertos['expertos'][keyE]
	 if(este){
	 var apendaE='<div id="categoriasExperto">'+
	 '<a href="'+este.url+'/<?=$tituloC?>">'+
	 '<div class="left avatarDiv"><div class="avatar30"><img src="'+este.img+'" height="100%"></div><div class="avatarT30"> ' +este.nombre+'</div></div></a>'+
	 '</div>';
	 $('#herramientaExperto').append(apendaE);
	 
 
	  
	 var apendaExp='<div class="div100">'+
    '<div class="expertoIzq ">'+
    '<div class="expertoIzqDiv" ><div class="avatar150" style="background-image:url('+este.img+')"></div></div>  '+
    '</div>'+
    '<div class="expertoDerecha  padd5">'+
    '<div class="clear10"></div>'+
    '<div class="div100 tituloSmall bold"  >'+este.nombre+'</div>  '+
    '<div class="clear10"></div>'+
    ' <div class="div100" >'+este.info.abstract+'</div>'+
    '</div>'+
	'</div><div class="clear10"></div>';
	  
	  $('#losExpertones').append(apendaExp);
	 cuentaExp=cuentaExp+1;
	 }
	 })

if(cuentaExp==1){$('#sobreExper').html('Sobre el Experto')}else {
$('#sobreExper').html('Sobre los Expertos');
}

})

 function guardaCheck(cual){
var ponH;
var pon=localStorage['herramientas'];
if(pon){
ponH=JSON.parse(pon);
}
else{ponH={}}

if(ponH[cual]){ delete ponH[cual];}else {
ponH[cual]=1;
}
localStorage['herramientas']=JSON.stringify(ponH);
}

function ponChecks(){
var pon=localStorage['herramientas'];
if(pon){
pon=JSON.parse(pon);
$.each(pon, function(key, val){
console.log(key);
$( "#c"+key ).prop( "checked", true );

})

}

}
$(function() {
ponChecks();
});
</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
