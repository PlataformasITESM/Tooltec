<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 


$valor=limpiaGET($_GET['v']);

$res6 = $mysqli->query("SELECT * FROM seccionesMenu WHERE id='$valor' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloMenu= $fila['titulo_es'];
	$editable= $fila['editable'];
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>

<script type="text/javascript" src="js.js?u=<?=aleatorio(3)?>"></script>


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
<div class="titulos">MENÚ / <?=$tituloMenu?></div>

 <div class="clear20"></div>
 
    
  <? include "menuAddForma.php"; ?>  
 

</div>


</div>
 


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 

</body>
</html>