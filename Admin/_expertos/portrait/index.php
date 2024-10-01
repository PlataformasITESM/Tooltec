<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include_once "../../sesion/mata.php"; 

$valor=limpiaGet($_GET['u']);



 $res6 = $mysqli->query("SELECT * FROM expertos WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo_es'];
	$img= $fila['img'];
	}


?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="<?=$url?>/js/cropper.js"></script>
<link rel="stylesheet" href="<?=$url?>/js/cropper.css" /> 
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
<div class="titulos" style="font-size:  14px;"> expertos </div>

<? include "../tabs.php"; ?>
 <div class="titulos"> <?=$tituloM?>  </div>
 


<div class="clear10"></div>
<? include "../expertos/tabs.php"; ?>

<div class="blanco10">  
<? include "avatarForma.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

    <script>
$('#q_expertos').addClass('seccionMenuP');
	$('#c_port').addClass('seccionMenuP');
</script>

</body>
</html>