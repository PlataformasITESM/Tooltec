<? include "../../sesion/arriba.php"; 
$dondeSeccion="registros";
include "../../sesion/mata.php"; 

$valor=$_GET['u'];
$valor=limpiaGET($valor);
 
$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$idArea= $fila['idArea'];
	$campos= $fila['campos'];
	$orden= $fila['orden'];
	}
	
	$campos=arregloSaca($campos);
	$orden=explode(',',$orden); 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<div class="titulos">Registros / <?=$titulo?></div>
<? include "../registros/opciones.php"; ?>	
	
	
 <a href="camposAdd.php?u=<?=$valor?>"  >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar Campo</div>
</div>  
            </a>
 
 

<? include "camposTodos.php";?>
</div>
<? include "../../interfase/foot.php"; ?>
</div>


<!--aqui-->

</div>

<div style="clear:both;"></div>

 
<script>
$('.seccionMenuI').removeClass('seccionMenuP');
$('#c_campos').addClass('seccionMenuP');
</script>
</body>
</html>