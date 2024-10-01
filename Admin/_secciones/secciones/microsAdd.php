<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$m=mataMalos($_GET['m']);

$res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$m' AND muerto='0' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloMicro= $fila['titulo_es'];
	$urlM_es= $fila['url_es'];
	$urlM_en= $fila['url_en'];
	
	}

$valor=mataMalos($_GET['u']);
$tituloT="Nueva seccion";
$res6 = $mysqli->query("SELECT * FROM microSitios WHERE id='$valor' AND muerto='0' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tipo= $fila['tipo'];
	$activo= $fila['activo'];
	$menuSuperior= $fila['menuSuperior'];
	$menuLateral= $fila['menuLateral'];
	$titulo_es= $fila['titulo_es'];
	$tituloT= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'];
	$tituloPagina_es= $fila['tituloPagina_es'];
	$tituloPagina_en= $fila['tituloPagina_en'];
	$url_es= $fila['url_es'];
	$url_en= $fila['url_en'];
	$meta=arregloSaca($fila['meta']);
	
	$permisos=unserialize($fila['permisos']);
	
	$metaDes_es=$meta['metaDes_es'];
	$metaDes_en=$meta['metaDes_en'];
	
	$metaKeys_es=$meta['metaKeys_es'];
	$metaKeys_en=$meta['metaKeys_en'];
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
<span style="font-size:14px;" id="estamosTSub">micro sitio  / <?=$tituloMicro?></span>
<div class="clear5"></div>

<div id="estamosT"><?=$tituloT?></div>
</div>
<div class="div50">

<div class="blanco10T" style="padding-right: 50px;">

<div class="blanco10TI">

<a href="<?=$url?>/_secciones/secciones/micro?u=<?=$m?>">     
<div class="seccionMenuI seccionMenu" id="">
        <div class="material-icons">keyboard_arrow_left</div>
</div> 
</a>

</div>
</div>

<? include "microsAddForma.php" ;?>
</div>



</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

<script>
$('#c_info').addClass('seccionMenuP');
</script>

</body>
</html>