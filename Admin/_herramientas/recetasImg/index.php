<? include "../../sesion/arriba.php"; 
$dondeSeccion="recetas";
include "../../sesion/mata.php"; 

$valor=limpiaGet($_GET['u']);


$tituloM="Nuevo queso";
 $res6 = $mysqli->query("SELECT * FROM recetas WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo_es'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?>"></script>


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

<div class="titulos" style="font-size:  14px;"> quesos </div>

<? include "../tabs.php"; ?>
 <div class="titulos"> <?=$tituloM?>  </div>
 


<div class="clear10"></div>


<? include "../recetas/tabs.php"?>
<? include "imagenesAddForma.php" ;?>
</div>



</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

<script>
$('#q_recetas').addClass('seccionMenuP');
	$('#c_imagenes').addClass('seccionMenuP');
 
</script>

</body>
</html>