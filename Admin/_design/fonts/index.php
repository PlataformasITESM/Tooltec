<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";

//primero carguemos las fuentes
$gogs="https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBLBeqjz4y-yYybCig6p1PMKnt9g4PLLNU";

$gogs= file_get_contents($gogs) ;

$gogs=json_decode($gogs,true)['items'];

foreach($gogs as $ks=>$fuentes){

$idF=nombreBonito($fuentes['family']);
$familia=$fuentes['family'];
$categoria=$fuentes['category'];

$query="INSERT INTO fuentes (id) VALUES ('$idF')";
$mysqli->query($query);
$query="UPDATE  fuentes SET nombre='$familia', categoria='$categoria' WHERE id='$idF'";
$mysqli->query($query);
}

//
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
	<div class="titulos">FUENTES</div>
</div>

<div id="sub">

<div class="clear20"></div>

<? include "../tabs.php"; ?>

<div class="blanco10">

	A continuación se muestran las tipografías de Google Fonts. Para utilizarlas en tu sitio es necesario que primero las agregrues a tu librería. <br>
	<br>
	Para hacer pruebas y experimentar con las tipografías, visita directamente el catálogo de google fonts en:  <a href="https://fonts.google.com/" target="_blank"> https://fonts.google.com
	</a>
	<br><br>

	<div class="clear"></div>
	<div class="div100">
	<div class="table" style="width: 50%;">
	<div class="tableCell padd5">
	<select id="fuentes" class="choseado">
	<option value="" disabled selected>Selecciona fuente</option>
	<? 	$res6 = $mysqli->query("SELECT * FROM fuentes WHERE id!='' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$fuente=$fila['nombre'];
	$idF=$fila['id'];
	?>
	<option value="<?=$idF?>"><?=$fuente?></option>
	
	<? } ?>
	</select>
	</div>
	<div class="tableCell padd5">
	<div class="material-icons cursor" onClick="agregaFuente()">add_circle</div>
	</div>
	</div>
	</div>
	<? include "fuentesTodos.php"; ?>

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
$('#m_fonts').addClass('seccionMenuP');
$(function() {
  $('.load').hide();
			
});

</script>