<? include "../../sesion/arriba.php"; 
$dondeSeccion="choferes";
include "../../sesion/mata.php"; 
$valor=limpiaGet($_GET['dri']);

?>
<!DOCTYPE html>
<html translate="no">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>

<script type="text/javascript" src="<?=$url?>/js/cropper.js"></script>
<link rel="stylesheet" href="<?=$url?>/js/cropper.css" /> 
 
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body>

 <div class="contC">
 


<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">

<? include "../../interfase/header.php"; ?>

 
<div id="sub">

<? include  "tabsD.php";?>   
 

<div class="blanco10"> 
<? include "driversAddForma.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?>"></script>
 

</div>

<div style="clear:both;"></div>

<script>
$('.seccionMenuI').removeClass('seccionMenuP');
$('#c_retrato').addClass('seccionMenuP');

</script>

</body>
</html>