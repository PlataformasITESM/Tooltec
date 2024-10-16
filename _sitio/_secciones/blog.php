<? include "../sesion/arriba.php";
$s="blog";
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

//las categorias


?>
<!doctype html>
<html lang="<?=$idioma?>">
<head>
  <meta name="description" content="<?=$metaDes['metaDes_es']?>">
 
<meta charset="utf-8">
<title><?=html_entity_decode($tituloPagina)?></title>
 <?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp");
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

<div id="filtrones">


</div>


<script>


var herras=expertos['blogs'];
var cuenta=0
$.each(herras, function(key, val){
cuenta=cuenta+1;



    var apenda=''+
    '<div class="div33 padd10 catsCont '+val.categoria+'">'+
	'<div class="div100 categorias">'+
	'<a href="'+val.url+'"><div class="div100 categoriasBorde">'+
'<div class="categoriasImg" style="background-image:url('+val.imgt+')"></div>'+
'</div></a>'+
'<div class="div100 padd10">'+
	'<div class="clear15"></div>'+
	'<div class="div100" id="exp'+val.id+'"></div>'+
		'<div class="clear15"></div>'+
	'<a href="'+val.url+'"><div class="categoriasTitulo">'+val.titulo+'</div></a>'+
	'<div class="clear15"></div>'+
	 val.info.subTitulo+
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
   
 

  var cats=expertos['blogCats'];
  
  $('#filtrones').append('<div onclick="muestraFiltros()" class="close">x</div><div class="clear10"></div><div class="div100 categoriasTitulo">Categorías</div><div class="clear10"></div>');
  
 $.each(cats, function(keyE, valE){
	 
	 var apendaE='<div class="div100">'+
	 '<div class="div100 padd5 cursor mensaje opacidadI" onclick="filtros(\''+valE.id+'\')">'+
	 '<div class="material-icons checos" id="checos'+valE.id+'">radio_button_unchecked</div>'+
	 '<div class="div100">'+valE.titulo+'</div>'+
	 '</div>'
	 '</div>';
	 $('#filtrones').append(apendaE);
	  
	 }) 
  


  
 $('#filtrones').appendTo('#losFiltros');
 
 function filtros(cual){
 $('.catsCont').hide();
 $('.'+cual).show();
 $('.checos').text('radio_button_unchecked');
 $('#checos'+cual).text('radio_button_checked');
 
 }
 
 function muestraFiltros(){
 $('#filtrones').slideToggle(300);
 }
 
</script>

<? include "../interfase/footer.php"; ?>
</body>
</html>
