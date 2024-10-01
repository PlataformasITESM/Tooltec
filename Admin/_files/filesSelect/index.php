<? include "../../sesion/arriba.php"; 
$conecta=1;
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.o../../xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="<?=$url?>/_files/js.php"></script>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body>


<div class="fondoMensaje">

	<div class="alertBox">
<div class="alertBoxR" id="eliminarArchivo">

<div class="close" onClick="closeAlert(); return false;">X</div>

<div class="alertBoxC">
<div class="alertBoxCell"><img src="<?=$url?>/iconos/alerta.svg"></div>
<div class="alertBoxCell">¿Desea eliminar definitivamente los archivos seleccionados?<br>
 Esto afectará a todas las instancias donde se encuentren.</div>


</div>
<div class="clear20"></div>

<div class="botonEnviar" style="float:right;">
      <input type="submit" onClick="eliminarArchivos();return false;" value="Delete" />
    </div>

</div>

<div class="alertBoxR" id="eliminarFolder">

<div class="close" onClick="closeAlert(); return false;">X</div>

<div class="alertBoxC">
<div class="alertBoxCell"><img src="<?=$url?>/iconos/alerta.svg"></div>
<div class="alertBoxCell">¿Desea eliminar definitivamente el folder?<br>
 Esto eliminará todos los archivos que contenga y  afectará a todas las instancias donde se encuentren.</div>



</div>
<div class="clear20"></div>

<div class="botonEnviar" style="float:right;">
      <input type="submit" onClick="eliminarFolder();return false;" value="Delete" />
    </div>

</div>


</div>

</div>

<!--head-->

<div class="head">

<? include $ruta."/interfase/header.php"; ?>

</div>
<!--head-->

<!--cont-->
<div class="contC">
<div class="contF">



<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">
<div class="titulos">Files</div>
<div class="div"></div>

<input type="text" value="<?=$tipoArchivoSeleccion?>" />
***
<div class="load" style="position:absolute;"></div>
<div id="sub" style="margin-top:0px; float:left; width:100%;">
<? include "archivos.php";?>
</div>





</div>


<!--aqui-->

</div>

</div>

<div style="clear:both;"></div>

<!--footer-->
<div class="footer">
<? include "../../interfase/foot.php";?>
</div>
<!--footer-->
 

</body>
</html>