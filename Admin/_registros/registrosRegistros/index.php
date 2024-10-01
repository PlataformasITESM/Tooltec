<? include_once "../../sesion/arriba.php"; 




$dondeSeccion="registros";
include_once "../../sesion/mata.php"; 




 
$valor=$_GET['u'];
$valor=limpiaGet($valor);

$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$crm= $fila['crm'];
	$permisos= $fila['permisos'];
	$idProveedor= $fila['idProveedor'];
	$permisos= $fila['usuarios'];
	$camposT= $fila['campos'];
	$campos= arregloSaca($fila['campos']);
 	$orden= $fila['orden'];
	$camposF= $fila['camposF'];
	}
?>
 
<!DOCTYPE html PUBLIC>
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

<div id="sub">
<div class="titulos">Registros / <?=$titulo?> </div>

<? include "../registros/opciones.php";?>
<? include "registrosTodos.php";?>
</div>
<? include "../../interfase/foot.php"; ?>
</div>


<!--aqui-->

</div>

<div style="clear:both;"></div>

 
<script>
$('.seccionMenuI').removeClass('seccionMenuP');
$('#c_todos').addClass('seccionMenuP');
</script>
</body>
</html>