<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="usuarios";
include_once "../../sesion/mata.php"; 

?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?f=<?=aleatorio(2);?>"></script>



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
<div class="titulos" style="font-size:  14px;"> usuarios registrados </div>
 
<? include "tabs.php"; ?>
<? include "usuariosTodos.php";?>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>
<script>
$('#q_registros').addClass('seccionMenuP');
</script>
 

</body>
</html>