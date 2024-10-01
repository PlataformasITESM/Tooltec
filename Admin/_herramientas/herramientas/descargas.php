<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 

$valor=limpiaGet($_GET['u']);


$tituloM="Nueva descarga";
 $res6 = $mysqli->query("SELECT * FROM herramientas WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo_es'];
	}


?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?> "></script>
<script type="text/javascript" src="<?=$url?>/_files/filesSelect/js.js?o=<?=aleatorio(2)?>"></script>


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
<div class="titulos" style="font-size:  14px;"> herramientas </div>

<? include "../tabs.php"; ?>
 <div class="titulos"> <?=$tituloM?>  </div>
 


<div class="clear10"></div>
<? include "tabs.php"; ?>

 <a href="descargasAdd?u=<?=$valor?>" >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar descarga</div>
</div>  
</a>

<div onClick="reordena('herramientasDescargas');" class="botonSin right" id="c_agregar"  >
      <div class="material-icons">swap_vert</div>
       		<div class=" div100 " >Reordenar</div>
</div> 

<div class="blanco10">  
<? include "descargasTodas.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

    <script>
$('#q_herramientas').addClass('seccionMenuP');
	$('#c_descargas').addClass('seccionMenuP');
</script>

</body>
</html>F