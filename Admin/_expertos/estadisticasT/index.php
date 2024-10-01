<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include_once "../../sesion/mata.php"; 

$rep=$_GET['rep'];
if($rep==""){$rep="vistas";}
?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?f=<?=aleatorio(2);?>"></script>
<script src="<?=$url?>/js/charts/amcharts.js"></script>
<script src="<?=$url?>/js/charts/serial.js"></script>


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


<div id="sub">

<div class="div100">
<div class="titulos">Expertos </div>

</div>

<? include "../tabs.php"; ?>
<? include "buscador.php"; ?>
<? include "tabs.php"; ?>


<div class="blanco10 overflowX">

<? 
if($rep=="vistas"){include "reporte.php";}
if($rep=="likes"){include "reporteL.php";}
if($rep=="full"){include "reporteF.php";}
 
 ?>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 
    <script>
$('#q_estadisticas').addClass('seccionMenuP');
$('#m_<?=$rep?>').addClass('seccionMenuP');
</script>

</body>
</html>