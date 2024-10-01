<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="experto";
include_once "../../sesion/mata.php"; 

$valor=limpiaGet($_GET['u']);
$ing=limpiaGet($_GET['ing']);


 
 $res6 = $mysqli->query("SELECT * FROM expertos WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo_es'];
	}
	
	
	$res6 = $mysqli->query("SELECT * FROM expertosCualificaciones WHERE id='$ing'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$texto_es= $fila['texto_es'];
	$texto_en= $fila['texto_en'];
	$tipo= $fila['tipo'];
	}


?>
<!DOCTYPE html>
<html>



<head>

<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?> "></script>
<script type="text/javascript" src="<?=$url?>/_files/filesSelect/js.js?o=<?=aleatorio(2)?>"></script>
	
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
<div class="titulos" style="font-size:  14px;"> expertos </div>

<? include "../tabs.php"; ?>
 <div class="titulos"> <?=$tituloM?>  </div>
 


<div class="clear10"></div>
<? include "tabs.php"; ?>
 

<div class="blanco10">  
<? include "cualificacionesAddForma.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

    <script>
$('#q_expertos').addClass('seccionMenuP');
	$('#c_cualificaciones').addClass('seccionMenuP');
</script>

</body>
</html>