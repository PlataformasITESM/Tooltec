<? include "../../sesion/arriba.php"; 

$dondeSeccion="usuariosSys";
include "../../sesion/mata.php"; 



$valor=$_GET['u'];
$valor=limpiaGet($valor);

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js"></script>


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
<div class="titulosS">USUARIOS <?=$nombreEmpresa?> </div>
<div class="titulos">VENDEDORES</div>

</div>




<div id="sub">
<? include "tabs.php";?>
<? include "vendedoresTodos.php";?>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 <script>
$('.seccionMenu').removeClass('seccionMenuP');
$('#vendedor').addClass('seccionMenuP');
</script>

</body>
</html>