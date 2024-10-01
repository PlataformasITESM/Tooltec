<? include "../../sesion/arriba.php"; 
$dondeSeccion="experiencias";
include "../../sesion/mata.php"; 

$valor=limpiaGet($_GET['u']);
$tipoC=limpiaGet($_GET['v']);

 $res6 = $mysqli->query("SELECT * FROM codigo WHERE id='$valor'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['nombre'];
	$codigo=  base64_decode($fila['codigo']);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?j=<?=aleatorio(2);?> "></script>
  <script src="<?=$urlFront?>/ace/ace.js" type="text/javascript" charset="utf-8"></script>
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
<div class="titulosDiv">
<div class="titulos">CÓDIGO <?=$tipoC?> | <?=$tituloM?></div>

</div>
 
<div id="sub">

<?  include "tabs.php"; ?>

<div class="blanco10">  
<? include "codigoAddForma.php" ;?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

    <script>
$('.seccionMenuI').removeClass('seccionMenuP');
	$('#m_<?=$tipoC?>').addClass('seccionMenuP');
</script>

</body>
</html>