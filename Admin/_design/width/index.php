<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? 
include "../../control/magia.php"; 
include "../../control/css.php"; 
?>
<script src="js.js?o=<?=aleatorio(3);?>" /></script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 
</head>

<body>


<!--cont-->
<div class="contC">

<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">

<? include "../../interfase/header.php"; ?>
<div class="titulosDiv">
	<div class="titulosS">SITIO</div>
	<div class="titulos">ANCHO SITIO</div>
</div>

<div id="sub">

<div class="clear20"></div>

<? include "../tabs.php"; ?>

<div class="blanco10">
<? include "anchoAddForma.php"; ?>
</div>

</div>

 
<!--aqui-->
</div>

<? include "../../interfase/foot.php"; ?>

<!--cont-->
</div>


</body>
</html>

<script>
$('#m_width').addClass('seccionMenuP');
$(function() {
  $('.load').hide();
});

</script>