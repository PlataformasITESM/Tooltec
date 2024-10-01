<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 
$valor=mataMalos($_GET['u']);

$res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$valor' AND muerto='0' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo_es'];
	$urlM= $fila['url_es'];
	
	
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

<div class="div100 left titulos">
<span style="font-size:14px;" id="estamosTSub"></span>
<div class="clear5"></div>

<div id="estamosT">MIcro sitio / <?=$titulo?> </div>
</div>
 <a href="microsAdd?m=<?=$valor?>" >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar página</div>
</div>  
</a>

<div onClick="reordena('microSitios');" class="botonSin right" id="c_agregar"  >
      <div class="material-icons">swap_vert</div>
       		<div class=" div100 " >Reordenar</div>
</div>  

<div class="blanco10 overflowX">
<? include "microTodos.php" ;?>
</div>
</div>

<? include "../../interfase/foot.php"; ?>
</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>
<script>
$('#c_<?=$tipo?>').addClass('seccionMenuP');
</script>
</body>
</html>