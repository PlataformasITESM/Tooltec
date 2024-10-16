<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$tituloPagina?></title>
<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
 include "magia.php";
 include "css.php";
?> 
   <link href="/css/style.css?u=<?=aleatorio(3);?>" rel="stylesheet" type="text/css" />
   <link href="/css/animate.css" rel="stylesheet" type="text/css" />
 </head>

<body>

 
  <? if ($gracias!="") {

	 ?>

<div id="agendaBox" style="display:none;z-index:999999; background-color:rgba(255,255,255,0.94); color:#000; position:fixed; width:100%; height:100%;">

<div id="agendaBoxDiv" style="position:absolute; background-color:#FFF; padding:10px; width:350px; top: 50%;   left: 50%;  transform: translate(-50%, -50%);">
<div class="cerrar" onclick="cerrar();">X</div>

<div id="nombreForma"></div>

<div class="clear10"></div>

<div id="graciasForma"></div>
<div class="clear10"></div>

</div>

</div>

	 <script>
 
	 
	 var estoyEn=document.location.href;
	  estoyEn = estoyEn.replace("gracias/", "");
	  estoyEn = estoyEn.replace("gracias", "");
	  
	 var nombreRegistradoV= localStorage.nombreRegistrado;
	 var mensajeGraciasV=localStorage.mensajeGracias;

	 if(nombreRegistradoV!=""){
		 $('#agendaBox').fadeIn();
		 $('#nombreForma').html(nombreRegistradoV);
		 $('#graciasForma').html(mensajeGraciasV);
	 }
	   
	localStorage.clear();
	  
$(function(){
    window.setTimeout(espera,2000);
});

$(function(){
    window.setTimeout(cerrar,5000);
});

function espera()
{
    window.history.pushState("string", "Title", estoyEn);

}
function cerrar()
{
	 $('#agendaBox').fadeOut();
}

</script>
<? } ?>

<div id="aqui"></div>
<?
include "contenido.php";
?>
 

    
    
	<? if ($gracias!="") {

	 ?>
	 <script>
	 
	 var estoyEn=document.location.href;
	  estoyEn = estoyEn.replace("gracias/", "");
	  estoyEn = estoyEn.replace("gracias", "");
$(function(){
    window.setTimeout(espera,1000);
});

function espera()
{
    window.history.pushState("string", "Title", estoyEn);
}</script>
<? } ?>
	       
        </body>
</html>