<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?u=<?=aleatorio(2);?>"></script>
<script type="text/javascript" src="<?=$url?>/js/cropper.js"></script>
<link rel="stylesheet" href="<?=$url?>/js/cropper.css" />
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
<div class="alertBoxCell material-icons">warning</div>
<div class="alertBoxCell">¿Deseas borrar permanentemente los archivos?<br>
 
Esto afectará a todas las secciones donde estén presentes.</div>


</div>
<div class="clear20"></div>

<div class="botonEnviar" style="float:right;">
      <input type="submit" onClick="eliminarArchivos();return false;" value="Borrar" />
    </div>

</div>

<div class="alertBoxR" id="eliminarFolder">

<div class="close" onClick="closeAlert(); return false;">X</div>

<div class="alertBoxC">
<div class="alertBoxCell material-icons">warning</div>
<div class="alertBoxCell">
¿Deseas borrar permanentemente la carpeta?<br>

Esto eliminará todos sus archivos y afectará a todas las secciones donde estén presentes</div>



</div>
<div class="clear20"></div>

<div class="botonEnviar" style="float:right;">
      <input type="submit" onClick="eliminarFolder();return false;" value="Borrar" />
    </div>

</div>


</div>

</div>

<!--cont-->
<div class="contC">
 


<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">

<? include "../../interfase/header.php"; ?>
 
 
<div id="sub">

<div class="div100 left titulos">
ARCHIVOS
</div>
<div class="clear10"></div>

<div class="blanco10"> 
<? include "archivos.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>

</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>
 
<script>

$(window).on('hashchange', function () 
{
var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
     archivos(hash);
});

if(window.location.hash) {
var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
     archivos(hash);
	 
} else {
  // Fragment doesn't exist
}
</script>

</body>
</html>