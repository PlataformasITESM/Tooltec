<? include "../../sesion/arriba.php"; 
$dondeSeccion="languages";
include "../../sesion/mata.php"; 


$valor=$_GET['u'];
$valor=limpiaGet($valor);

$idioma=$_GET['i'];
$idioma=limpiaGet($idioma);

$res6 = $mysqli->query("SELECT * FROM emails   WHERE id='$valor' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$tituloM= $fila['titulo'];
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="titulosDiv">
<div class="titulosS">EMAIL</div>
<div class="titulos"><?=$tituloM?>  </div>

</div>
 
<div id="sub">
<div class="clear20"></div>

  <div class="blanco10T"> 
  
<a href="<?=$url?>/_emails/emails"> 
 <div class="seccionMenuI">
        <div class="material-icons padd10NL">chevron_left</div>
</div> 
</a>		

<a href="?u=<?=$valor?>&i=es"> 
 <div class="seccionMenuI" id="c_es">
        <div class="material-icons padd10NL">translate</div>
       	<div class="seccionMenuC tableCell   padd10NR">Español</div>
</div> 
</a>

<? if($valor!='footer') { ?>

<a href="?u=<?=$valor?>&i=en"> 
 <div class="seccionMenuI" id="c_en">
        <div class="material-icons padd10NL">translate</div>
       	<div class="seccionMenuC tableCell   padd10NR">Inglés</div>
</div> 
</a>

<? } ?> 
</div>

<div class="blanco10">  
<? include "emailsAddForma.php";?>
</div>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

    <script>
$('.seccionMenuI').removeClass('seccionMenuP');
	$('#c_<?=$idioma?>').addClass('seccionMenuP');
</script>

</body>
</html>