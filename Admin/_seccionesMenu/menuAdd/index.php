<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 

$padre=limpiaGET($_GET['p']);
$valor=limpiaGet($_GET['e']);

$res6 = $mysqli->query("SELECT * FROM seccionesMenu WHERE id='$padre' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloMenu= $fila['titulo_es'];
	$editable= $fila['editable'];
	}
	
	$tituloE="Nueva entrada";
	
$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE id='$valor' ");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$titulo_es= $fila['titulo_es'];
	$tituloE=$titulo_es;
	$titulo_en= $fila['titulo_en'];
	$idTitulo= $fila['idTitulo'];
	$idSeccion= $fila['idSeccion'];
	$urlSeccion= $fila['urlSeccion'];
	$urlMenu= $fila['url'];
	$tipoSub= $fila['tipo'];
	$ligaTarget_es= $fila['ligaTarget_es'];
	$liga_es= $fila['liga_es'];
	$color= $fila['color'];
	$activo= $fila['activo'];
	
	$ligaTarget_en= $fila['ligaTarget_en'];
	$liga_en= $fila['liga_en'];
	$dondeMenu= $fila['menu'];
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

    <div class="titulos">MENÚ / <?=$tituloMenu?> / <?=$tituloE?> </div>
 <div class="clear20"></div>

    
  <? include "menuMenuAddForma.php"; ?>  
 

</div>


</div>
 


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 

</body>
</html>