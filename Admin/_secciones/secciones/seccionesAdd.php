<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include_once "../../sesion/mata.php"; 

$valor=mataMalos($_GET['u']);
$tituloT="Nueva seccion";

$res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$valor' AND muerto='0' ");
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
	$micro=unserialize($fila['micro']);
	
	$metaDes_es=$meta['metaDes_es'];
	$metaDes_en=$meta['metaDes_en'];
	
	$metaKeys_es=$meta['metaKeys_es'];
	$metaKeys_en=$meta['metaKeys_en'];
	}
?>
<!DOCTYPE html PUBLIC>
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
<span style="font-size:14px;" id="estamosTSub">secciones</span>
<div class="clear5"></div>

<div id="estamosT"><?=$tituloT?></div>
</div>
<div class="div100">

<div class="blanco10T" style="padding-right: 50px;">

<div class="blanco10TI">

<a href="<?=$url?>/_secciones/secciones/">     
<div class="seccionMenuI seccionMenu" id="">
        <div class="material-icons">keyboard_arrow_left</div>
</div> 
</a>

</div>
</div>

<? include "seccionesAddForma.php" ;?>
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