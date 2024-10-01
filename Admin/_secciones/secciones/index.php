<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 
$campo=limpiaGET($_GET['c']);
if($campo==""){$campo="titulo_es";}

$orden=limpiaGET($_GET['o']);
if($orden==""){$orden="asc";}


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

<div id="estamosT">secciones</div>
</div>


 <a href="seccionesAdd" >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar sección</div>
</div>  
</a>



<div class="blanco10 overflowX">
<? include "seccionesTodos.php" ;?>
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