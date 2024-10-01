<? include_once "../../sesion/arriba.php"; 

$dondeSeccion="admins";
include_once "../../sesion/mata.php"; 

$valor=$_GET['u'];
$valor=limpiaGet($valor);

$ver=$_GET['v'];
$ver=limpiaGet($ver);

 


?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?ud=<?=aleatorio(3);?>"></script>


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
<div class="titulosS">USUARIOS  </div>
<div class="titulos"><?=$ver?></div>

</div>

 

<div id="sub">
<? include "tabs.php";?>
<? if($ver!=""){ ?>
<? include "usuariosTodos.php";?>
<? } ?>
</div>
 

<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 <script>
$('.seccionMenu').removeClass('seccionMenuP');
$('#m_<?=$ver?>').addClass('seccionMenuP');
$('#quesoy').text('/ <?=$verM?>');
</script>

</body>
</html>